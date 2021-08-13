<?php

namespace App\Http\Controllers;


use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountryWithDivisions(Request $request){
        return Country::where('country_name',$request->country_name)->with('divisions')->get();
    }
}
