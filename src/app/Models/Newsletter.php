<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    // Permitindo o preenchimento em massa para o campo 'email'
    protected $fillable = ['email'];
}
