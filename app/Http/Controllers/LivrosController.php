<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Genero;

class LivrosController extends Controller
{
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros = Livro::paginate(4);

        return view('livros.index',[
            'livros'=>$livros
        ]);
    }

    public function show(Request $req){
        $idLivro = $req->id;
        //$livro = Livro::findOrFail($idLivro);
        //$livro = Livro::find($idLivro);
        $livro = Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();

        return view('livros.show',['livro'=>$livro]);
    }

    public function create(){
        $generos = Genero::all();
        return view('livros.create',['generos'=>$generos]);
    }

    public function store(Request $r){
        //$novoLivro = $r->all();
        //dd($novoLivro);
        $novoLivro = $r->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['required','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable','min:3','max:255'],
            'id_genero'=>['nullable','numeric','min:1'],
            'id_autor'=>['nullable','numeric','min:1'],
            'sinopse'=>['nullable','min:3','max:255']
        ]);

        $livro = Livro::create($novoLivro);

        return redirect()->route('livros.show',['id'=>$livro->id_livro]);
    }

    public function edit(Request $r){
        $generos = Genero::all();
        $id = $r -> id;
        $livro = Livro::where('id_livro',$id)->with(['genero','autores','editoras'])->first();
        return view('livros.edit',['livro'=>$livro,'generos'=>$generos]);
    }

    public function update(Request $r){
        $id = $r -> id;
        $livro = Livro::where('id_livro',$id)->with(['genero','autores','editoras'])->first();
        $editarLivro = $r->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['required','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable','min:3','max:255'],
            'id_genero'=>['nullable','numeric','min:1'],
            'id_autor'=>['nullable','numeric','min:1'],
            'sinopse'=>['nullable','min:3','max:255']
        ]);

        $livroAtualizado = $livro->update($editarLivro);

        return redirect()->route('livros.show',['id'=>$livro->id_livro]);
    }

    public function delete(Request $r){
        $livro = Livro::where('id_livro',$r->id)->with(['genero','autores','editoras'])->first();

        if(is_null($livro)){
            return redirect()->route('livros.index')->with('msg','O livro não existe');
        }
        else{
            return view('livros.delete',['livro'=>$livro]);
        }
    }

    public function destroy(Request $r){
        $livro = Livro::where('id_livro',$r->id)->with(['genero','autores','editoras'])->first();
        if(is_null($livro)){
            return redirect()->route('livros.index')->with('msg','O livro não existe');
        }
        else{
            $livroEliminado = $livro->delete();
            return redirect()->route('livros.index');
        }
    }
}
