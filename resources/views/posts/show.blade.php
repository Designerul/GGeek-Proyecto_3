<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="md:col-span-2">
                <article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden" style="background: #FFE69A">
                    <div class="px-6 py-2">
                        <article class="mb-6 shadow-lg rounded-lg overflow-hidden px-6 py-2" style="background: #FFFFFF">
                            <div class="px-6 py-2">
                                {{-- Muestra de titulo --}}
                                <h1 style="color: #92B4EC; font-weight: bold; font-size: x-large">
                                    {{ $post->name }}
                                </h1>

                                {{-- Muestra de extracto --}}
                                <div style="font-size: large;" class="mb-4">
                                    {!! $post->extract !!}
                                </div>
                            </div>

                            {{-- Muestra de imagen con condicional if --}}
                            <figure>
                                @if ($post->image)
                                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                                @else
                                    <img class="w-full h-80 object-cover object-center" src="{{ asset('image/image_not.png') }}" alt="">
                                @endif
                            </figure>

                            <div class="px-6 py-2">
                                {{-- Muesta de cuerpo  --}}
                                <div>
                                    {!! $post->body !!}
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- Ver comentarios --}}
                    <div class="px-6 py-2">
                        <article class="mb-6 shadow-lg rounded-lg overflow-hidden px-6 py-2" style="background: #FFFFFF">
                            <h3 style="color: #92B4EC; font-weight: bold; font-size: x-large">
                                Comentarios:
                            </h3>

                            @foreach ($comments as $comment)
                                <article class="mb-6 shadow-lg rounded-lg overflow-hidden px-6 py-2" style="background: #FFD24C">
                                   
                                    {{-- Recuperar la foto del usuario --}}
                                    <img class="h-8 w-8 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="">
                                   
                                    <table>
                                        {{-- Recuperar el nombre de usuario --}}
                                        <td>
                                            <h4 style="font-weight: bold;">
                                                {{ $comment->user->name }}
                                            </h4>
                                        </td>
                                        {{-- Recupera la fecha de creacion del comentario --}}
                                        <td class="px-2">
                                            {{ $comment->created_at }}
                                        </td>
                                    </table>

                                    {{-- Recuperar el cuerpo de comentario --}}
                                    <p class="form-control">
                                        {{ $comment->body }}
                                    </p>

                                    {{-- Boton para eliminar etiqueta --}}
                                    @if (auth()->user())
                                        @include('comments.edit')
                                    @endif
                                   
                                </article>
                            @endforeach
                            
                            {{-- Agregar comentarios --}}
                            <article class="mb-6 shadow-lg rounded-lg overflow-hidden px-6 py-2">
                    
                                @include('comments.create')

                            </article>
                    </div>
                </article>
            </div>

            {{-- Contenido relacionado --}}
            <aside>

                <h1 class="text-xl font-bold text-gray-600 mb-4">
                    Contenido relacionado:
                </h1>

                <ul>
                    @foreach ($similares as $similar)
                        <article class="mb-6 shadow-lg rounded-lg overflow-hidden" style="background: #FFE69A">
                                {{-- Muestra de imagenes similares con condicional if --}}
                                <article>
                                    @if ($similar->image)
                                        <img class="w-full h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="">
                                    @else
                                        <img class="w-full h-20 object-cover object-center" src="{{ asset('image/image_not.png') }}" alt="">
                                    @endif
                                </article>

                                {{-- Muestra de nombre de similares --}}
                                <a class="flex" href="{{ route('posts.show', $similar) }}">
                                    <span class="ml-2" style="font-weight: bold; color: #92B4EC;">{{ $similar->name }}</span>
                                </a>
                        </article>
                    @endforeach
                </ul>

            </aside>
        </div>
    </div>
</x-app-layout>