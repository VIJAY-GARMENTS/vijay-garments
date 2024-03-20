<?php

namespace Aaran\Taskmanager\Models;


use Aaran\Audit\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taskmanager\NoticeBoard
 *
 * @property int $id
 * @property string $cdate
 * @property string|null $client_id
 * @property string $vname
 * @property string|null $remarks
 * @property string|null $active_id
 * @property int $user_id
 * @property string|null $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client|null $client
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard query()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereCdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoard whereVname($value)
 * @mixin \Eloquent
 */
class NoticeBoard extends Model
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
