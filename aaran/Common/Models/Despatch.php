<?php

namespace Aaran\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Despatch extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
