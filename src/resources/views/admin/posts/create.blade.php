@extends('layouts.base')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Criar Novo Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
        @csrf
        <!-- Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 font-bold mb-2">Título</label>
            <input type="text" name="titulo" id="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <!-- Resumo -->
        <div class="mb-4">
            <label for="resumo" class="block text-gray-700 font-bold mb-2">Resumo</label>
            <textarea name="resumo" id="resumo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
        </div>

        <!-- Conteúdo -->
        <div class="mb-4">
            <label for="conteudo" class="block text-gray-700 font-bold mb-2">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required></textarea>
        </div>

        <!-- Botão de Enviar -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Salvar Post
            </button>
        </div>
    </form>
</div>
@endsection