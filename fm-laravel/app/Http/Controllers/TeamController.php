<?php


namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    public function getAll(){
        return Team::all();
    }
}
