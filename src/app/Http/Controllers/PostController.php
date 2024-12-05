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
        $posts = Post::latest()->paginate(12); //recupera todos os posts
        if (Auth::check()) {
            // O usuário está logado
            return view('posts.index', compact('posts')); //retorna a view com os posts
        } else {
            // O usuário não está logado
            return view('welcome', compact('posts')); //retorna a view com os posts
        }

        //função para mostar posts
    }

    public function show($id) //mostrar um post  específico
    {
        $post = Post::find($id); // Busca o post pelo ID
        if (Auth::check()) {
            // O usuário está logado
            return view('posts.show', compact('post'));; //retorna a view com os posts
        } else {
            // O usuário não está logado
            return view('posts.show_guest', compact('post')); //retorna a view com os posts
        }
        
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
        ]);

        // Adicione a URL da imagem de forma automática
        $validated['imagem'] = 'https://placecats.com/640/480';


        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
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

        // Processar upload de imagem, se houver
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('posts', 'public');
            $validated['imagem'] = $path;
        }

        $post->update($validated); // Atualiza os dados do post

        return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Post atualizado com sucesso!');
    }

    // Método para excluir um post
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Recupera o post pelo ID
        $post->delete(); // Exclui o post do banco de dados

        return redirect()->route('posts.index')->with('success', 'Post excluído com sucesso!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // Busca o post pelo ID ou retorna 404 se não encontrar
        return view('posts.edit', compact('post')); // Retorna a view com os dados do post
    }
}
