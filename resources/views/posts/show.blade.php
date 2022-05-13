<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">

        {{-- Muestra de titulo --}}
        <h1 style="color: gray; font-weight: bold; font-size: x-large">
            {{ $post->name }}
        </h1>

        {{-- Muestra de extracto --}}
        <div style="font-size: large; color:gray;" class="mb-4">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="md:col-span-2">

                    {{-- Muestra de imagen con condicional if --}}
                    <figure>
                        @if ($post->image)
                            <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                        @else
                            <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/03/22/01/58/monk-6113501_960_720.png" alt="">
                        @endif
                    </figure>

                    {{-- Muesta de body --}}
                    <div class="text-base text-gray-500 mt-4">
                        {!! $post->body !!}
                    </div>

            </div>

            {{-- Contenido relacionado --}}
            <aside>

                <h1 class="text-xl font-bold text-gray-600 mb-4">
                    Mas en {{ $post->category->name }}
                </h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                
                                {{-- Muestra de imagenes similares con condicional if --}}
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/03/22/01/58/monk-6113501_960_720.png" alt="">
                                @endif
                                
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>