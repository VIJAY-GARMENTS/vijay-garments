<?php

namespace Aaran\Orders\Models;

use Aaran\Orders\Database\Factories\StyleFactory;
use Aaran\Style\Models\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Style extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): StyleFactory
    {
        return new StyleFactory();
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function printDetails($ids): Collection
    {
        $obj = self::find($ids);

        return collect([
            'description' => $obj->desc,]);

    }
}
