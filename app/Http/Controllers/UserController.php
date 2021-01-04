<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(4);

        return view('index',[
            'users'=>$user
        ]);
    }
}
