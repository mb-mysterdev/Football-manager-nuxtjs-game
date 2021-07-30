<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show($id){
        return User::find($id);
    }

    public function create(Request $request){
        $user = new User();
        $user->user_name = $request->user_name;
        dd($user);
        $user->save();
//        dd(User::firstOrCreate(['f']));
    }
}
