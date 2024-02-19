<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    
    public function index(){

        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){

        Serie::create($request->all());
        // Serie::create($request->only(['nome']));
        // Serie::create($request->except(['_token']));

        return to_route('series.index');
    }

    public function destroy(Request $request){

        // dd($request->route());
        Serie::destroy($request->series);

        return to_route('series.index');
    }
}