<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
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
