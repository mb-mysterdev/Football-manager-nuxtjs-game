<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\Team;
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
    }

    public function show($id){
        $user = User::find($id)->with('teams')->get();
        $team = Team::find($user[0]->teams[0]['tu_team'])->get();
        $division = Division::find($user[0]->teams[0]['tu_division'])->get();
        $divisionUser = DivisionUser::where('du_user',$user[0]->teams[0]['tu_user'])->get();
        dd($user[0]->team);
        $user[0]->teams[0]['tu_name'] = $team[0]['team_name'];
        $user[0]->division = $division[0];
        return $user;
    }

    public function create(Request $request){
        return User::create($request->all());
    }
}
