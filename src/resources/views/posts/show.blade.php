@extends('layouts.app')

@section('content')
    <h1>{{ $post->titulo }}</h1>
    <p><strong>Resumo:</strong> {{ $post->resumo }}</p>
    <p>{{ $post->conteudo }}</p>
    @if ($post->imagem)
        <img src="{{ asset('storage/' . $post->imagem) }}" alt="Imagem do Post" style="max-width: 100%; height: auto;">
    @endif
    <a href="{{ route('posts.index') }}">Voltar para a lista de posts</a>

    @auth
        <div class="my-3">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar Post</a>
        </div>
    @endauth
@endsection
