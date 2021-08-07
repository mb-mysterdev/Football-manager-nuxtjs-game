<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Services\MatchServices\PlayMatchService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Test\Fixtures\Foo;

class FootballMatchController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMatchOfMyDivision(Request $request)
    {
        return FootballMatch::where('fm_user',$request->id)->where('fm_year',$request->fm_year)
            ->orderBy('fm_date', 'DESC')
            ->with('firstTeam')
            ->with('secondTeam')
            ->get();
    }

    public function nextMatch(Request $request){
      return FootballMatch::where('fm_user',$request->id)
          ->whereNull('fm_winner')
          ->where('fm_year',$request->fm_year)
          ->where(function ($query) use($request) {
              $query->where('fm_first_club',$request->team_id);
              $query->orWhere('fm_second_club',$request->team_id);
          })
            ->orderBy('fm_date', 'DESC')
            ->with('firstTeam')
            ->with('secondTeam')
            ->get()
          ->first();
    }

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FootballMatch  $footballMatch
     * @return \Illuminate\Http\Response
     */
    public function show(FootballMatch $footballMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FootballMatch  $footballMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(FootballMatch $footballMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FootballMatch  $footballMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FootballMatch $footballMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FootballMatch  $footballMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(FootballMatch $footballMatch)
    {
        //
    }
}
