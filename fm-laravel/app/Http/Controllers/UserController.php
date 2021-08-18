<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){
        return User::where('id',$id)->with('team')->get();
    }

    public function create(Request $request){
        return User::create($request->all());
    }
}
