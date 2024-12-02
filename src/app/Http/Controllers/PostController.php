<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //adicionar o crud basico no controlador

    public function index()
    {
        $posts = Post::all();//recupera todos os posts
        return view('posts.index', compact('posts'));//retorna a view com os posts
        //função para mostar posts
    }

    public function create()
    {
        //função para  criar posts, deve retornar a view com o formulário de criação
        return view('posts.create');
    }

    public function store(Request $request) // metodo para salvar um post novo no banco de dados
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|string|max:255',
        ]);

        Post::create($validated); //cria um post novo no bd

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }
}