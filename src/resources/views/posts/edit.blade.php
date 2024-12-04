@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Post</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}"enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $post->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="resumo" class="form-label">Resumo</label>
            <textarea name="resumo" id="resumo" class="form-control" rows="2" required>{{ $post->resumo }}</textarea>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" class="form-control" rows="5" required>{{ $post->conteudo }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
            @if($post->imagem)
                <p>Imagem atual: <img src="{{ asset('storage/' . $post->imagem) }}" alt="Imagem do Post" style="max-width: 200px;"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
