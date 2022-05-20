<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsIndexDelete extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $posts = Post::onlyTrashed()
                    ->where('user_id', auth()->user()->id)
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.posts-index-delete', compact('posts'));
    }
}
