<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edicao extends Model
{
    use HasFactory;

    protected $primaryKey="id_editora";
    protected $primaryKey2 = "id_livro";

    protected $table = "edicoes";
}
