<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Audit\Models\Client;
use Aaran\Taskmanager\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Taskmanager\Task
 *
 * @property int $id
 * @property int $client_id
 * @property string $title
 * @property string $body
 * @property string|null $channel
 * @property int $allocated
 * @property int $user_id
 * @property string|null $status
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $client
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAllocated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUserId($value)
 * @mixin \Eloquent
 */
class Task extends Model
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

    public static function allocate($str)
    {
        return User::find($str)->name;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reply() :HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
