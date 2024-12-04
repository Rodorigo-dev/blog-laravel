@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Post</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
