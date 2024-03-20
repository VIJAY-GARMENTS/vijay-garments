<?php

namespace Aaran\Audit\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\Gstfilling
 *
 * @property int $id
 * @property int $client_id
 * @property string $month
 * @property string $year
 * @property string|null $gstr1_arn
 * @property string|null $gstr1_date
 * @property string|null $gstr3b_arn
 * @property string|null $gstr3b_date
 * @property string|null $status_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master\Client $client
 * @method static Builder|Gstfilling newModelQuery()
 * @method static Builder|Gstfilling newQuery()
 * @method static Builder|Gstfilling query()
 * @method static Builder|Gstfilling whereClientId($value)
 * @method static Builder|Gstfilling whereCreatedAt($value)
 * @method static Builder|Gstfilling whereGstr1Arn($value)
 * @method static Builder|Gstfilling whereGstr1Date($value)
 * @method static Builder|Gstfilling whereGstr3bArn($value)
 * @method static Builder|Gstfilling whereGstr3bDate($value)
 * @method static Builder|Gstfilling whereId($value)
 * @method static Builder|Gstfilling whereMonth($value)
 * @method static Builder|Gstfilling whereStatusId($value)
 * @method static Builder|Gstfilling whereUpdatedAt($value)
 * @method static Builder|Gstfilling whereUserId($value)
 * @method static Builder|Gstfilling whereYear($value)
 * @mixin \Eloquent
 */
class Gstfilling extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
