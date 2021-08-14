<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\TeamUser;
use App\Services\MatchServices\PlayMatchService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Test\Fixtures\Foo;

class FootballMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMatchOfMyDivision(Request $request)
    {
        return FootballMatch::where('fm_user',$request->id)
            ->where('fm_division',$request->fm_division)
            ->where('fm_year',$request->fm_year)
            ->orderBy('fm_date', 'DESC')
            ->with('firstTeam')
            ->with('secondTeam')
            ->get();
    }

    public function nextMatch(Request $request)
    {
        return FootballMatch::where('fm_user', $request->id)
            ->where(function ($query) use ($request) {
                $teamUser = TeamUser::where('tu_user',$request->id)
                    ->where('tu_taken',1)
                    ->where('tu_active',1)->get();
                $query->where('fm_division', $teamUser->first()->tu_division);
            })
            ->whereNull('fm_winner')
            ->where('fm_year', $request->fm_year)
            ->where(function ($query) use ($request) {
                $query->where('fm_first_club', $request->team_id);
                $query->orWhere('fm_second_club', $request->team_id);
            })
            ->where('fm_date','>=',new \DateTime())
            ->orderBy('fm_date', 'ASC')
            ->with('firstTeam')
            ->with('secondTeam')
            ->get()
            ->first();
    }
}
