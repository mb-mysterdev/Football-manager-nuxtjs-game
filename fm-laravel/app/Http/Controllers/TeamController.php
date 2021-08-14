<?php


namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getAll(){
        return Team::all();
    }

    public function eligibleTeams(Request $request){
        return Team::where('team_min_level',$request->team_min_level)
            ->where('team_min_popularity',$request->team_min_popularity)
            ->get();
    }
}
