<?php

namespace App\Models\Blog;

use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable= ['title','body','image','user_id','company_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
