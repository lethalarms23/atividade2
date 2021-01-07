<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Like;
use Auth;

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
        $utilizador = "";
        //$livro = Livro::findOrFail($idLivro);
        //$livro = Livro::find($idLivro);
        $likes = Like::where('id_livro',$idLivro)->count();
        $livro = Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $utilizador = Like::where('id_user','like',$idUser)->where('id_livro','like',$idLivro)->first();
        }
        return view('livros.show',['livro'=>$livro,'likes'=>$likes,'utilizador'=>$utilizador]);
    }

    public function create(){
        $generos = Genero::all();
        $autores = Autor::all();
        $editora = Editora::all();
        return view('livros.create',['generos'=>$generos,'autores'=>$autores,'editoras'=>$editora]);
    }

    public function store(Request $r){
        $novoLivro = $r->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['required','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['image','nullable','max:2000'],
            'id_genero'=>['nullable','numeric','min:1'],
            'sinopse'=>['nullable','min:3','max:255']
        ]);
        if($request->hasFile('imagem-capa')){
            $nomeImagem = $request->file('imagem_capa')->getClientOriginalName();
            $nomeImagem = time().'_'.$nomeImagem;
            $guardarImagem = $request->file('imagem_capa')->storeAs('imagems/livros'.$nomeImagem);

            $novoLivro['imagem_capa']=$nomeImagem;
        }
        if(Auth::check()){
            $userAtual = Auth::user()->id;
            $novoLivro['id_user']=$userAtual;
        }
        else{
            return redirect()->route('login')->with('msg','Não está logado');
        }
        $autores = $r->id_autor;
        $editora = $r->id_editora;
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editora);
        return redirect()->route('livros.show',['id'=>$livro->id_livro]);
    }

    public function edit(Request $r){
        $id = $r -> id;
        $livro = Livro::where('id_livro',$id)->with(['genero','autores','editoras'])->first();
        if(Gate::allows('atualizar-livro',$livro) || Gate::allows('admin')){
            $generos = Genero::all();
            $autores = Autor::all();
            $editora = Editora::all();
            $autoresLivro = $livro->autores->pluck('id_autor')->toArray();
            $editoraLivro = $livro->editoras->pluck('id_editora')->toArray();
            return view('livros.edit',['livro'=>$livro,'generos'=>$generos,'autores'=>$autores,'autoresArray'=>$autoresLivro,'editorasArray'=>$editoraLivro,'editoras'=>$editora]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Não tem permissão para aceder a área pretendida');
        }
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
            'imagem_capa'=>['image','nullable','max:2000'],
            'id_genero'=>['nullable','numeric','min:1'],
            'sinopse'=>['nullable','min:3','max:255']
        ]);
        if($r->hasFile('imagem_capa')){
            $nomeImagem = $r->file('imagem_capa')->getClientOriginalName();
            $nomeImagem = time().'_'.$nomeImagem;
            $guardarImagem = $r->file('imagem_capa')->storeAs('imagems/livros', $nomeImagem);
            $editarLivro['imagem_capa']=$nomeImagem;
        }
        $autores = $r->id_autor;
        $editoras = $r->id_editora;
        $livroAtualizado = $livro->update($editarLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);
        return redirect()->route('livros.show',['id'=>$livro->id_livro]);
    }

    public function delete(Request $r){
        $livro = Livro::where('id_livro',$r->id)->with(['genero','autores','editoras'])->first();
        if(isset($livro->users->id_user)){
            if(Auth::user()->id == $livro->users->id_user || Gate::allows('admin')){
                if(is_null($livro)){
                    return redirect()->route('livros.index')->with('msg','O livro não existe');
                }
                else{
                    return view('livros.delete',['livro'=>$livro]);
                }
            }
            else{
                return redirect()->route('livros.index')->with('msg','Sem permissão');
            }
        }
        else{
            if(is_null($livro)){
                return redirect()->route('livros.index')->with('msg','O livro não existe');
            }
            else{
                return view('livros.delete',['livro'=>$livro]);
            }
        }
    }

    public function destroy(Request $r){
        $autoresLivro = Livro::findOrfail($r->id)->autores;  
        $editorasLivro = Livro::findOrfail($r->id)->editoras;
        $livro = Livro::where('id_livro',$r->id)->with(['genero','autores','editoras'])->first();
        $livro->autores()->detach($autoresLivro);
        $livro->editoras()->detach($editorasLivro);
        if(is_null($livro)){
            return redirect()->route('livros.index')->with('msg','O livro não existe');
        }
        else{
            $livro->delete();
            return redirect()->route('livros.index');
        }
    }

    public function likes(Request $r){
        $id = $r->id;
        if(Auth()->check()){
            $idUser = Auth::user()->id;
            $like = Like::where('id_user','=',$idUser)->where('id_livro','=',$id)->first();
            if($like == null){
                $novoLike['id_user']=$idUser;
                $novoLike['id_livro']=$id;
                $like = Like::create($novoLike);
                return redirect()->route('livros.show',['id'=>$id]);
            }
            else{
                return redirect()->route('livros.show',['id'=>$id]);
            }
        }
        else{
            return redirect()->route('livros.show',['id'=>$id]->with('msg','Não está logado'));
        }
    }
}
