<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Auth;

class AutorController extends Controller
{
    public function index(){
        $autores = Autor::paginate(4);

        return view('autores.index',[
            'autores'=>$autores
        ]);
    }

    public function show(Request $req){
        $idAutor = $req->id;

        $autor = Autor::where('id_autor',$idAutor)->with('livros')->first();

        return view('autores.show',['autores'=>$autor]);
    }

    public function create(){
        return view('autores.create');
    }

    public function store(Request $r){
        $novoAutor = $r->validate([
            'nome'=>['required','min:1','max:100'],
            'nacionalidade'=> ['required','min:1','max:20'],
            'data_nascimento'=> ['nullable','date'],
            'fotografia'=>['nullable','min:1','max:255'],
        ]);

        $autor = Autor::create($novoAutor);

        return redirect()->route('autores.show',['id'=>$autor->id_autor]);
    }

    public function edit(Request $r){
        $id = $r -> id;
        $autor = Autor::where('id_autor',$id)->with('livros')->first();
        return view('autores.edit',['autor'=>$autor]);
    }

    public function update(Request $r){
        $id = $r -> id;
        $autor = Autor::where('id_autor',$id)->with('livros')->first();
        $editarAutor = $r->validate([
            'nome'=>['required','min:1','max:100'],
            'nacionalidade'=> ['required','min:1','max:20'],
            'data_nascimento'=> ['nullable','date'],
            'fotografia'=>['nullable','min:1','max:255'],
        ]);

        $autorAtualizado = $autor->update($editarAutor);

        return redirect()->route('autores.show',['id'=>$autor->id_autor]);
    }

    public function delete(Request $r){
        $autor = Autor::where('id_autor',$r->id)->with('livros')->first();

        if(is_null($autor)){
            return redirect()->route('autores.index')->with('msg','O Autor não existe');
        }
        else{
            return view('autores.delete',['autor'=>$autor]);
        }
    }

    public function destroy(Request $r){
        $autor = Autor::where('id_autor',$r->id)->with('livros')->first();

        if(is_null($autor)){
            return redirect()->route('autores.index')->with('msg','O Autor não existe');
        }
        else{
            $autorEliminado = $autor->delete();
            return redirect()->route('autores.index');
        }
    }
}
