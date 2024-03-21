<?php

namespace Aaran\Audit\Models\Client\Sub;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
