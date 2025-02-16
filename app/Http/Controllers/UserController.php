<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function add_inscription(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
        ]);
    }
}
