<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = Serie::query()->orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){
//        $request->validate([
//            'name' => 'required|min:3'
//        ]);
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem', "Série criada com sucesso {$serie->name}");
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request) {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série deletada com sucesso");
        return redirect()->route('listar_series');
    }
}
