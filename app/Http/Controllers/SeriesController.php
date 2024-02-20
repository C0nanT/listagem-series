<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    
    public function index(Request $request){

        $series = Serie::query()->orderBy('nome')->get();

        $mensagemSuccess = session('mensagem.success');

        return view('series.index')->with('series', $series)->with('mensagemSuccess', $mensagemSuccess);
    }

    public function create(){

        return view('series.create');
    }

    public function store(Request $request){

        $serie = Serie::create($request->all());
        $request->session()->flash("mensagem.success", "Série -> $serie->nome <- adicionada!");
        // Serie::create($request->only(['nome']));
        // Serie::create($request->except(['_token']));

        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request){

        $series->delete();
        $request->session()->flash('mensagem.success', "Série -> $series->nome <- removida!");

        return to_route('series.index');
    }
}