@extends('layouts.base')

@section('content')
    <h1>Lista de Posts</h1>

    <!-- Link para criar um novo post -->
    <a href="{{ route('admin.posts.create') }}">Criar Novo Post</a>

    <!-- Mensagens de sucesso -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Lista de posts -->
    <ul>
        @foreach($posts as $post)
            <li>
                <strong>{{ $post->titulo }}</strong><br>
                <samll>{{ $post->resumo }}</samll>
                <hr>
                
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}

@endsection