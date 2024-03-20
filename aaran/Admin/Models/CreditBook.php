<?php

namespace Aaran\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\CreditBook
 *
 * @property int $id
 * @property string $vname
 * @property string $closing
 * @property string|null $active_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereClosing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBook whereVname($value)
 * @mixin \Eloquent
 */
class CreditBook extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
}
