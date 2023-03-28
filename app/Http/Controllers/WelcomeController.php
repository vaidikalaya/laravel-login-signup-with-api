<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request){
        if($request->path()==='register' || $request->path()==='login'){
            return view('auth.'.$request->path());
        }
        else if($request->path()==='dashboard'){
            return view('dashboard');
        }
        else{
            return view('welcome');
        }
    }
}
