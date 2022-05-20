@props(['post'])

<article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden" style="background: #FFE69A">
    
    {{-- Muestra de imagen con codicional if --}}
    @if ($post->image)
        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
    @else
        <img class="w-full h-80 object-cover object-center" src="{{ asset('image/image_not.png') }}" alt="">
    @endif

    {{-- Muestra el nombre del post y extracto --}}
    <div class="px-6 py-2">
        <h1 class="" style="color: #92B4EC; font-weight: bold; font-size: x-large">
            <a href="{{  route('posts.show', $post) }}">{{  $post->name }}</a>
        </h1>

        {{-- Extracto --}}
        <div>
            <h2 style="font-weight: bold;">
                {!! $post->extract !!}
            </h2>
        </div>
    </div>

    {{-- Muestra las etiquetas --}}
    <div style="text-align: center;" class="mb-4">
        <table>
            <td class="px-6">
                <h3>
                    Etiquetas:
                </h3>
            </td>
            @foreach ($post->tags as $tag)
            <td class="px-2">
                <a href="{{  route('posts.tag', $tag) }}"class="inline-block text-white" style="border-radius: 15px; background-color: #84b6f4; padding: 5px; margin:2px; font-weight: bold;" >
                    {{ $tag->name }}
                </a>
            </td>
            @endforeach
        </table>
    </div>
</article>