@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Criar Novo Post</h1>

                <!-- Exibe erros de validação -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulário de criação -->
                <form action="{{ route('posts.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input 
                            type="text" 
                            name="titulo" 
                            id="titulo" 
                            class="form-control @error('titulo') is-invalid @enderror" 
                            value="{{ old('titulo') }}" 
                            required>
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="resumo" class="form-label">Resumo:</label>
                        <textarea 
                            name="resumo" 
                            id="resumo" 
                            class="form-control @error('resumo') is-invalid @enderror" 
                            rows="3" 
                            required>{{ old('resumo') }}</textarea>
                        @error('resumo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="conteudo" class="form-label">Conteúdo:</label>
                        <textarea 
                            name="conteudo" 
                            id="conteudo" 
                            class="form-control @error('conteudo') is-invalid @enderror" 
                            rows="5" 
                            required>{{ old('conteudo') }}</textarea>
                        @error('conteudo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
