<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    public function index(){
        $generos = Genero::paginate(4);

        return view('generos.index',[
            'generos'=>$generos
        ]);
    }

    public function show(Request $req){
        $idGenero = $req->id;

        $genero = Genero::where('id_genero',$idGenero)->with('livros')->first();

        return view('generos.show',['generos'=>$genero]);
    }

    public function create(){
        return view('generos.create');
    }

    public function store(Request $r){
        $novoGenero = $r->validate([
            'designacao'=>['nullable','min:1','max:13'],
            'observacoes'=> ['nullable','min:1','max:13'],
        ]);

        $genero = Genero::create($novoGenero);

        return redirect()->route('genero.show',['id'=>$genero->id_genero]);
    }

    public function edit(Request $r){
        $id = $r -> id;
        $genero = Genero::where('id_genero',$id)->with('livros')->first();
        return view('generos.edit',['genero'=>$genero]);
    }

    public function update(Request $r){
        $id = $r -> id;
        $genero = Genero::where('id_genero',$id)->with('livros')->first();
        $editarGenero = $r->validate([
            'designacao'=>['nullable','min:1','max:13'],
            'observacoes'=> ['nullable','min:1','max:13'],
        ]);

        $generoAtualizado = $genero->update($editarGenero);

        return redirect()->route('genero.show',['id'=>$genero->id_genero]);
    }
}
