<?php


namespace App\Http\Controllers;

use App\Models\TeamUser;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function create(Request $request){
        return TeamUser::create($request->all());
    }
}
