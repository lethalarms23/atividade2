<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class PesquisaController extends Controller
{
    public function index(){
        return view('pesquisa');
    }

    public function process(Request $r){
        $text = $r -> pesquisainput;
        $res = Livro::where('titulo','LIKE','%'.$text.'%')->get();
        return view('pesquisares', ['texto'=>$text, 'resultado'=>$res]);
    }
}
