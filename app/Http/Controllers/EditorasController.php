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
}
