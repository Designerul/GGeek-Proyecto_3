<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2021/03/22/01/58/monk-6113501_960_720.png @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <h1 style=" font-weight: bold; font-size: x-large">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>

                        <div style="text-align: center;" class="mt-2">
                            @foreach ($post->tags as $tag)
                                 <a href="{{  route('posts.tag', $tag) }}" class="inline-block text-white" style="border-radius: 15px; background-color: #84b6f4; padding: 5px; margin:2px; font-weight: bold;">
                                     {{ $tag->name }}
                                 </a>
                             @endforeach
                         </div>

                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

</x-app-layout>