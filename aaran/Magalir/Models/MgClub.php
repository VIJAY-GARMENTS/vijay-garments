<?php

namespace Aaran\Magalir\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Magalir\MgClub
 *
 * @property int $id
 * @property string $vno
 * @property string|null $vname
 * @property string|null $desc
 * @property string|null $active_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub query()
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereVname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgClub whereVno($value)
 * @mixin \Eloquent
 */
class MgClub extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }
}
