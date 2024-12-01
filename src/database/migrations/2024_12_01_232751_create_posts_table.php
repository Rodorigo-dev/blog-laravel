<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * usei o comando 'php artisan make:migration create_posts_table' para criar uma tabela com os campos dos posts
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //id da postagem
            $table->string('titulo'); //titulo do post
            $table->text('resumo'); //resumo do post
            $table->text('conteudo');//conteudo do post
            $table->string('image')->nullable(); // Caminho da imagem destacada (opcional)
            $table->timestamps();//para data de criação e atualização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
