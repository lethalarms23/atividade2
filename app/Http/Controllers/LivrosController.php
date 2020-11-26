<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

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
        return view('livros.create');
    }

    public function store(Request $r){
        //$novoLivro = $r->all();
        //dd($novoLivro);
        $novoLivro = $r->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['nullable','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','numeric','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable','min:3','max:255'],
            'id_genero'=>['nullable','numeric','min:1'],
            'id_autor'=>['nullable','numeric','min:1'],
            'sinopse'=>['nullable','min:3','max:255']
        ]);

        $livro = Livro::create($novoLivro);

        dd($livro);
    }
}
