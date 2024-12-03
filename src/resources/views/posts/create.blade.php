@extends('layouts.base')

@section('content')
    <h1>Criar Novo Post</h1>

    <!-- Exibe erros de validação -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Formulário de criação -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"><br><br>

        <label for="resumo">Resumo:</label><br>
        <textarea name="resumo" id="resumo">{{ old('resumo') }}</textarea><br><br>

        <label for="conteudo">Conteúdo:</label><br>
        <textarea name="conteudo" id="conteudo">{{ old('conteudo') }}</textarea><br><br>

        <label for="imagem">URL da Imagem (opcional):</label><br>
        <input type="text" name="imagem" id="imagem" value="{{ old('imagem') }}"><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection