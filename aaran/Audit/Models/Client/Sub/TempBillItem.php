<?php

namespace Aaran\Audit\Models\Client\Sub;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Client\Sub\TempBillItem
 *
 * @property-read Product|null $product
 * @property-read \App\Models\Master\Client\Sub\SalesTrackBill|null $salesTrackBill
 * @method static \Illuminate\Database\Eloquent\Builder|TempBillItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempBillItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempBillItem query()
 * @mixin \Eloquent
 */
class TempBillItem extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function salesTrackBill(): BelongsTo
    {
        return $this->belongsTo(SalesTrackBill::class);
    }
}
