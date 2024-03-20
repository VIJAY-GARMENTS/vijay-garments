<?php

namespace Aaran\Audit\Models\Client\Sub;

use App\Models\Master\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Client\Sub\SalesTrack
 *
 * @property int $id
 * @property string $vname
 * @property int|null $status
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $client
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesTrack whereVname($value)
 * @mixin \Eloquent
 */
class SalesTrack extends Model
{
    use HasFactory;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
