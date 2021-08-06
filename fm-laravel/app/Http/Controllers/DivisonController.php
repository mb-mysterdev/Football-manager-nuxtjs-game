<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $divison
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $divison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $divison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $divison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $divison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $divison)
    {
        //
    }
}
