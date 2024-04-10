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
    public $user_name;
    public Post $post;
    public $id;
    public $like = 0;
    public $test;
    public $likes;

    public function incrementLike($test)
    {
        $this->like++;
        if ($this->post!=''){
            if($test =='') {
                Like::create([
                    'post_id' => $this->post_id,
                    'like' => $this->like,
                ]);
            }else{
                $obj = Like::find($test);
                $obj ->post_id=$this->post_id;
                $obj ->like=$this->like=$obj->like+1;
                $obj->save();

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
        $this->validate(['user_name'=>'required']);
        if ($this->post_id !=''){
            if ($this->vid ==''){
                Comment::create([
                    'user_name'=>$this->user_name,
                    'body'=> $this->body,
                    'post_id'=> $this->post_id,
                ]);
            }
            $this->clearFields();
        }
    }

    public function clearFields()
    {
        $this->user_name='';
        $this->body='';
    }


    public function render()
    {
        return view('livewire.blog.post.view')->layout('layouts.web')->with([
            'list'=>Comment::where('post_id','=',$this->post_id)->orderBy('created_at','desc')
                ->paginate(5),
            'likes1'=>Like::where('post_id','=',$this->post_id)

        ]);

    }
}
