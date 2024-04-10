<?php

namespace Aaran\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailid extends Model
{
    protected $guarded=[];
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('email_id', 'like', '%' . $searches . '%');
    }

}
