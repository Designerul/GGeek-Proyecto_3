<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use App\Models\Comment;
use App\Models\User;

class PostController extends Controller
{

    /* Controlador de vista de index principal */
    public function index(){

        if (request()->page){
            $key = 'posts' . request()->page;
        }
        else{
            $key = 'posts';
        }

        if(Cache::has($key)){
            $posts = Cache::get($key);
        }
        else{
            $posts = Post::where('status', 2)->latest('id')->with('user:id,name')->paginate(11);
            Cache::put($key, $posts);
        }

        return view('posts.index', compact('posts'));
    }

    /* Controlador de vista de unico post principal */
    public function show(Post $post){

        $this->authorize('published', $post);

        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(8)
                            ->get();

        $comments = Comment::where('post_id', $post->id)
                                ->with('user:id,name')
                                ->get();

        $id_post = $post->id;

        return view('posts.show', compact('post', 'similares', 'comments', 'id_post'));
    }

    /* Controlador de vista por categoria principal */
    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                        ->with('user:id,name')
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    /* Controlador de vista por etiquetas pincipal */
    public function tag(Tag $tag){
        
        $posts = $tag->posts()->where('status', 2)->with('user:id,name')->latest('id')->paginate(4);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
