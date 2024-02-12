<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    

    public function index(Request $request){

        $series = [
            'House of Cards',
            'Arcane',
            'The Walking Dead',
            'FBI',
            'Chicago P.D.',    
            'HIMYM',
            'B99',
            "House's",
        ];

        return view('series.index')->with('series', $series);
    }

    public function create(){
        return view('series.create');
    }
}