<?php


namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getAll(){
        return Team::all();
    }

    public function eligibleTeams(int $id){
        $user = User::find($id);
        return Team::where('team_min_level','<=',$user->level)
            ->where('team_min_popularity','<=',$user->popularity)
            ->with('division.country')
            ->get();
    }
}
