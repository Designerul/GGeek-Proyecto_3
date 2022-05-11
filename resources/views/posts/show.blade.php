<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">

        {{-- Muestra de titulo --}}
        <h1 style="color: gray; font-weight: bold; font-size: x-large">
            {{ $post->name }}
        </h1>

        {{-- Muestra de extracto --}}
        <div style="font-size: large; color:gray;" class="mb-4">
            {{ $post->extract }}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="md:col-span-2">

                    {{-- Muestra de imagen --}}
                    <figure>
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                    </figure>

                    {{-- Muesta de body --}}
                    <div class="text-base text-gray-500 mt-4">
                        {{ $post->body }}
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
                                <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="">
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>