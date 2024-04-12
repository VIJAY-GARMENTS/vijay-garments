<?php

namespace App\Livewire\Blog\Post;

use App\Livewire\Trait\CommonTrait;
use App\Models\Blog\Comment;
use App\Models\Blog\Like;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;
    use CommonTrait;

    public $post_id;
    public string $vid='';
    public $body;
    public Post $post;
    public $id;
    public $like = 0;

    public function incrementLike()
    {
        $this->like++;

        if ($this->post_id!=''){
            if($this->id!='') {
                Like::create([
                    'post_id' => $this->post_id,
                    'like' => $this->like,
                ]);
            }
        }
    }


    public function mount($id)
    {
        if ($id) {
            $this->post = Post::find($id);
            $this->post_id= $id;
            $this->likes = Like::find($this->post_id);
        }
    }

    public function save(){
        if ($this->post_id !='') {
            if ($this->vid == '') {
                Comment::create([
                    'body' => $this->body,
                    'post_id' => $this->post_id,
                ]);
            } else {
                $comment = Comment::find($this->vid);
                $comment->body = $this->body;
            }
        }
    }

    public function clearFields()
    {
        $this->body='';
    }


    public function render()
    {
        return view('livewire.blog.post.view')->layout('layouts.web')->with([
            'list'=>Comment::where('post_id','=',$this->post_id)->orderBy('created_at','desc')
                ->paginate(5),
            'likes'=>Like::where('post_id','=',$this->post_id)

        ]);

    }
}
