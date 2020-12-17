<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = "Likes";

    public $timestamps = false;

    protected $fillable=[
        'id_user',
        'id_livro',
    ];

    public function livros(){
        return $this->belongsTo('App\Models\Livro','id_livro');
    }
    
    public function users(){
        return $this->belongsTo('App\Models\User','id_user');
    }
}
