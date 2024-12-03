@extends('layouts.base')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-center mb-6">Lista de Posts</h1>

    <!-- Link para criar um novo post -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            Criar Novo Post
        </a>
    </div>

    <!-- Mensagens de sucesso -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white shadow-md rounded p-4">
                <h3 class="text-xl font-semibold">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                        {{ $post->titulo }}
                    </a>
                </h3>
                <p class="text-gray-600 mt-2">{{ $post->resumo }}</p>
                <div class="mt-4">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                        Ler mais
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection