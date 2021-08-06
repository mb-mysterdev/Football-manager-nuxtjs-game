<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
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

        foreach ($teams as $team){
            $teamFirstResult = 0;
            $teamSecondResult = 0;
            if($team['fm_date'] <= (new \DateTime())->format('Y-m-d h:i:s')) {

                if($team['firstTeam']->teamUser['tu_power'] > $team['secondTeam']->teamUser['tu_power']){
                    $teamFirstResult = rand(1,4);
                    $teamSecondResult = rand(0,2);
                    $team->update(['fm_result_fc' => $teamFirstResult]);
                    $team->update(['fm_result_sc' => $teamSecondResult]);
                }else if($team['firstTeam']->teamUser['tu_power'] < $team['secondTeam']->teamUser['tu_power']) {
                    $teamSecondResult = rand(1,4);
                    $teamFirstResult = rand(0,2);
                    $team->update(['fm_result_sc' => $teamSecondResult]);
                    $team->update(['fm_result_fc' => $teamFirstResult]);
                }else {
                    $team->update(['fm_result_fc' => rand(0,4),'fm_result_sc' => rand(0,4)]);
                }

                if($teamSecondResult > $teamFirstResult){
                    $team->update(['fm_winner' => 'second_club']);
                }
                if($teamFirstResult > $teamSecondResult) {
                    $team->update(['fm_winner' => 'first_club']);
                }
                if($teamFirstResult == $teamSecondResult) {
                    $team->update(['fm_winner' => 'equality']);
                }
            }
        }
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
