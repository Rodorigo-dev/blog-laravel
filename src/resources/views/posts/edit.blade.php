@extends('layouts.base')

@section('content')
    <h1>Editar Post</h1>

    <!-- Exibe erros de validação -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Formulário de edição -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ $post->titulo }}"><br><br>

        <label for="resumo">Resumo:</label><br>
        <textarea name="resumo" id="resumo">{{ $post->resumo }}</textarea><br><br>

        <label for="conteudo">Conteúdo:</label><br>
        <textarea name="conteudo" id="conteudo">{{ $post->conteudo }}</textarea><br><br>

        <label for="imagem">URL da Imagem (opcional):</label><br>
        <input type="text" name="imagem" id="imagem" value="{{ $post->imagem }}"><br><br>

        <button type="submit">Atualizar</button>
    </form>
@endsection
