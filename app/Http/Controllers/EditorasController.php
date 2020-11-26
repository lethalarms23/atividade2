<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;

class EditorasController extends Controller
{
    public function index(){
        $editoras = Editora::paginate(4);

        return view('editoras.index',[
            'editoras'=>$editoras
        ]);
    }

    public function show(Request $req){
        $idEditora = $req->id;

        $editora = Editora::where('id_editora',$idEditora)->with('livros')->first();

        return view('editoras.show',['editoras'=>$editora]);
    }

    public function create(){
        return view('editoras.create');
    }

    public function store(Request $r){
        $novaEditora = $r->validate([
            'nome'=>['required','min:3','max:100'],
            'morada'=> ['required','min:5','max:255'],
            'observacoes'=> ['nullable','min:3','max:255'],
        ]);

        $editora = Editora::create($novaEditora);

        return redirect()->route('editoras.show',['id'=>$editora->id_editora]);
    }
}
