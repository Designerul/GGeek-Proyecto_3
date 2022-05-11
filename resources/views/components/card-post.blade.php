@props(['post'])

<article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
    {{-- Muestra de imagen --}}
    <img class="w-full h-80 object-cover object-center" src="{{  Storage::url($post->image->url) }}" alt="">

    {{-- Muestra el titulo del post y extracto --}}
    <div class="px-6 py-2">
        <h1 class="" style="font-weight: bold;">
            <a href="{{  route('posts.show', $post) }}">{{  $post->name }}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{ $post->extract }}
        </div>
    </div>

    {{-- Muestra las etiquetas --}}
    <div style="text-align: center;" class="mb-4">
        @foreach ($post->tags as $tag)
            <a href="{{  route('posts.tag', $tag) }}"class="inline-block text-white" style="border-radius: 15px; background-color: #84b6f4; padding: 5px; margin:2px; font-weight: bold;" >
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</article>