<x-app-layout>

    {{-- Muestra el nombre de la categoria --}}
    <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 py-8 py-8">
        <h1 class="uppercase text-center" style="font-weight: bold; font-size: x-large">
            Etiqueta: {{ $tag->name }}
        </h1>

        {{-- Muestra contenido del post --}}
        @foreach ($posts as $post)
            <x-card-post :post="$post" />
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>


</x-app-layout>