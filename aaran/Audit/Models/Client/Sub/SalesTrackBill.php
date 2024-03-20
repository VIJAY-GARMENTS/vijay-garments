<?php

namespace Aaran\Audit\Models\Client\Sub;

use App\Models\Master\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Client\Sub\SalesTrackBill
 *
 * @property-read Client $client
 * @property-read \App\Models\Master\Client\Sub\SalesTrackItem|null $salesTrackItem
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackBill query()
 * @mixin \Eloquent
 */
class SalesTrackBill extends Model
{

    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function salesTrackItem(): BelongsTo
    {
        return $this->belongsTo(SalesTrackItem::class);
    }


}
