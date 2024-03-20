<?php

namespace Aaran\Taskmanager\Models;


use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taskmanager\Turnover
 *
 * @property int $id
 * @property int $client_id
 * @property int $month
 * @property int $year
 * @property string|null $target
 * @property string|null $achieved
 * @property string|null $remarks
 * @property string|null $status_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover query()
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereAchieved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turnover whereYear($value)
 * @mixin \Eloquent
 */
class Turnover extends Model
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
}
