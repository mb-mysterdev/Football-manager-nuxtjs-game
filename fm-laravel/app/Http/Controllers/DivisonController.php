<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisonController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $divison
     * @return \Illuminate\Http\Response
     */
    public function showDefaultTeams(Request $request)
    {
        return Division::where('division_id','=',$request->division_id)->with('defaultTeams')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $divison
     */
    public function showUserDivisionTeams(Request $request)
    {
        $teamsOfDivision = Division::where('division_id',$request->division_id)->with('teams')->get()->first();
        $tempTeamsOfDivision = $teamsOfDivision->toArray();
        foreach ($tempTeamsOfDivision['teams'] as $key => $division){
            $division['tu_ranking'] = $key + 1;
            $tempTeamsOfDivision['teams'][$key] = $division;
            TeamUser::where('tu_user',$request->id)
                ->where('tu_team',$division['tu_team'])
                ->update(['tu_ranking'=> $key + 1]);
        }
        return $tempTeamsOfDivision;
    }

}
