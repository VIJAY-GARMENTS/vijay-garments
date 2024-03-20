<?php

namespace Aaran\Audit\Models\Client\Sub;

use App\Models\Master\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Client\Sub\SalesTrackItem
 *
 * @property int $id
 * @property int $serial
 * @property int $sales_track_id
 * @property int $client_id
 * @property int|null $total_count
 * @property string|null $total_value
 * @property int|null $status
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $client
 * @property-read \App\Models\Master\Client\Sub\SalesTrack $salesTrack
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereSalesTrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereTotalCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrackItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesTrackItem extends Model
{

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function salesTrack(): BelongsTo
    {
        return $this->belongsTo(SalesTrack::class);
    }
}
