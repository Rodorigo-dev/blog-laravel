<div class="container mx-auto mt-8 bg-gradient-to-b from-blue-50 via-white to-blue-100">
    <h1 class="text-3xl font-bold text-center mb-6">Lista de Posts</h1>

    <!-- Link para criar um novo post -->

    @auth
        <div class="flex justify-end mb-6">
            <a href="{{ route('posts.create') }}"
                class="btn btn-primary bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-blue-700 hover:shadow-xl transition duration-200">
                Criar Novo Post
            </a>
        </div>
    @endauth

    <!-- Mensagens de sucesso -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de posts -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col justify-between h-full">
                <!-- Imagem do post -->
                <div class="h-48 w-full overflow-hidden">
                    @if ($post->imagem)
                        <img src="{{ $post->imagem }}" alt="{{ $post->titulo }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://via.placeholder.com/350x150" alt="Imagem padrão" class="w-full h-full object-cover">
                    @endif
                </div>

                <!-- Conteúdo do post -->
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="text-lg font-semibold text-blue-600 mb-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">
                            {{ $post->titulo }}
                        </a>
                    </h3>
                    <p class="text-gray-700 flex-grow mb-4">
                        {{ Str::limit($post->resumo, 100) }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                            Ler mais
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-8 flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
