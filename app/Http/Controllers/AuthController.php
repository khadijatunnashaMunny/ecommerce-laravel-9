<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class AuthController extends Controller
{
    //register
    public function register(){
        return view('frontend.pages.register');
    }
    
    //register submit
    public function registerSubmit(Request $request){

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['password_confirmation'] = Hash::make($request->password_confirmation);


        $INS = DB::table('users')->insert($user);
        return Redirect('/');

       
    }

     // Login
     public function login(){
        return view('frontend.pages.login');
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return redirect('/user/login');
    }

    //loginsubmit
    public function loginSubmit(Request $request){
        $user = user::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "Username or password is not matched";
        } else {
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }
}
