<?php

namespace Aaran\Audit\Models\Client\Sub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Master\Client\Sub\TempBill
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TempBill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempBill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempBill query()
 * @mixin \Eloquent
 */
class TempBill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
}
