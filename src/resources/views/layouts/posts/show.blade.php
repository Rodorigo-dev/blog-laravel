<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $post->titulo }}</h1>

            <!-- Imagem do Post -->
            @if ($post->imagem)
                <div class="my-4 text-center">
                    <img src="{{ $post->imagem }}" alt="Imagem do Post" class="img-fluid rounded w-100">
                </div>
            @endif

            <p class="card-text"><strong>Resumo:</strong> {{ $post->resumo }}</p>

            <p class="card-text">{{ $post->conteudo }}</p>

            <div class="d-flex justify-content-between mt-4">
                <a class="btn btn-secondary" onclick="history.back()">Voltar para a lista de posts</a>

                @auth
                    <div class="d-flex">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning me-2">Editar Post</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>