<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

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
}
