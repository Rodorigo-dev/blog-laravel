<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    use HasFactory;
    protected $table = 'posts'; // Nome da tabela no banco de dados
    // Definindo quais colunas podem ser preenchidas
    protected $fillable = ['titulo', 'resumo', 'conteudo', 'imagem'];
}
