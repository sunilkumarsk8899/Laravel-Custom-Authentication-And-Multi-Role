<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{

    public function login(){
        return view('welcome');
    }

    public function home(){
        echo "home";
    }
    public function MultiAuthLogin(Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email', 'password'))){
            // echo auth()->user()->role_type;
            // $this->redirectMultiAuth();
            switch(auth()->user()->role_type){
                case "super_admin":
                    echo "super_admin";
                    return redirect()->route('super_admin.index');
                    break;
                case "admin":
                    echo "admin";
                    return redirect()->route('admin.index');
                    break;
                case "user":
                    echo "user";
                    return redirect()->route('user.index');
                    break;
            }
        }else{
            echo "not match info";
        }
    }

    public function redirectMultiAuth(){
        switch(auth()->user()->role_type){
            case "super_admin":
                echo "super_admin";
                return redirect()->route('super_admin.index');
                break;
            case "admin":
                echo "admin";
                return redirect()->route('admin.index');
                break;
            case "user":
                echo "user";
                return redirect()->route('user.index');
                break;
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
