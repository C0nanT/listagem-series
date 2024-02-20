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

        Serie::create($request->all());
        $request->session()->flash('mensagem.success', 'Série adicionada!');
        // Serie::create($request->only(['nome']));
        // Serie::create($request->except(['_token']));

        return to_route('series.index');
    }

    public function destroy(Request $request){

        // dd($request->route());
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.success', 'Série removida!');

        return to_route('series.index');
    }
}