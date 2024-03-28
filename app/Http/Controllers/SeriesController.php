<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    
    public function index(Request $request){

        $series = Series::all();

        $mensagemSuccess = session('mensagem.success');

        return view('series.index')->with('series', $series)->with('mensagemSuccess', $mensagemSuccess);
    }

    public function create(){

        return view('series.create');
    }

    public function store(SeriesFormRequest $request){

        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasons; $i++){
            $seasons [] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season){
            for ($j = 1; $j <= $request->episodes; $j++){
                $episodes [] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        $request->session();

        return to_route('series.index')
            ->with("mensagem.success", "Série '$serie->nome' adicionada!");
    }

    public function destroy(Series $series){

        $series->delete();

        return to_route('series.index')
            ->with('mensagem.success', "Série '$series->nome' removida!");
    }

    public function edit(Series $series){
        return view('series.edit')->with('serie', $series);
        
    }

    public function update(Series $series, SeriesFormRequest $request){
        
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.success', 'Série editada com sucesso!');
        
    }
}