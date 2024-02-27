<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request){

        $serie = Serie::create($request->all());
        $request->session();

        return to_route('series.index')
            ->with("mensagem.success", "Série -> $serie->nome <- adicionada!");
    }

    public function destroy(Serie $series){

        $series->delete();

        return to_route('series.index')
            ->with('mensagem.success', "Série -> $series->nome <- removida!");
    }

    public function edit(Serie $series){
        dd($series->temporadas);
        return view('series.edit')->with('serie', $series);
        
    }

    public function update(Serie $series, SeriesFormRequest $request){
        
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.success', 'Série editada com sucesso!');
        
    }
}