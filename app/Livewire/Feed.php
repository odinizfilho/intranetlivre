<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class Feed extends Component
{
    public $blogs;
    public $postCount = 2;

    public function loadMorePosts()
    {
        $this->postCount += 2;
    }

    public function render()
    {
        $this->blogs = Blog::limit($this->postCount)->get();
        return view('livewire.feed');
    }
}
