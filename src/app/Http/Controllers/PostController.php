<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    //adicionar o crud basico no controlador

    public function index() //exibe a lista de posts
    {
        $posts = Post::latest()->paginate(10); //recupera todos os posts
        return view('posts.index', compact('posts')); //retorna a view com os posts
        //função para mostar posts
    }

    public function show($id) //mostrar um post  específico
    {
        $post = Post::findOrFail($id); // Busca o post pelo ID
        return view('posts.show', compact('post'));
    }

    // Listagem de posts na administração
    public function adminIndex()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        //função para  criar posts, deve retornar a view com o formulário de criação
        return view('admin.posts.create');
    }

    public function store(Request $request) // metodo para salvar um post novo no banco de dados
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|string|max:255',
        ]);

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post criado com sucesso!');
    }

    // Método para atualizar um post existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|string|max:255',
        ]);

        $post = Post::findOrFail($id); // Recupera o post pelo ID
        $post->update($validated); // Atualiza os dados do post

        return redirect()->route('admin.posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    // Método para excluir um post
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Recupera o post pelo ID
        $post->delete(); // Exclui o post do banco de dados

        return redirect()->route('admin.posts.index')->with('success', 'Post excluído com sucesso!');
    }
}
