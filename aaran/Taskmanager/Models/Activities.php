<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Audit\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taskmanager\Activities
 *
 * @property int $id
 * @property int $user_id
 * @property string $cdate
 * @property string $vname
 * @property string|null $client_id
 * @property string|null $duration
 * @property string|null $channel
 * @property string|null $remarks
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client|null $client
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereCdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereVname($value)
 * @mixin \Eloquent
 */
class Activities extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
