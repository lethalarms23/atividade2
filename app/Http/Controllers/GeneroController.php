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
}
