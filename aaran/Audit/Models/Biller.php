<?php

namespace Aaran\Audit\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Master\Biller
 *
 * @property int $id
 * @property int $client_id
 * @property string $vname
 * @property string $mode
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Biller newModelQuery()
 * @method static Builder|Biller newQuery()
 * @method static Builder|Biller query()
 * @method static Builder|Biller whereActiveId($value)
 * @method static Builder|Biller whereClientId($value)
 * @method static Builder|Biller whereCreatedAt($value)
 * @method static Builder|Biller whereId($value)
 * @method static Builder|Biller whereMode($value)
 * @method static Builder|Biller whereUpdatedAt($value)
 * @method static Builder|Biller whereVname($value)
 * @mixin \Eloquent
 */
class Biller extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
}
