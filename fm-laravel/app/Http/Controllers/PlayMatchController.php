<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Services\MatchServices\PlayMatchService;

class PlayMatchController extends Controller
{
    public function playMatch(){
        $teams = FootballMatch::where('fm_year',2021)
            ->where('fm_result_fc',null)
            ->where('fm_result_sc',null)
            ->with('firstTeam')
            ->with('secondTeam')
            ->get();
        $playMatchService = new PlayMatchService($teams);

        return $playMatchService->playMatch();
    }
}
