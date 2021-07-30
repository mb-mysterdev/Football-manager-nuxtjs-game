<?php

namespace App\Http\Controllers;

class UserConfigController extends Controller
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
        return $id;
    }
}
