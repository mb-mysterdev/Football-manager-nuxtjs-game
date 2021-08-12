<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function showUserDivisionTeams(Request $request)
    {
        return Division::where('division_id','=',$request->division_id)->with('teams')->get();
    }

}
