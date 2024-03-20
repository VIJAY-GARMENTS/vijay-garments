<?php

namespace Aaran\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Admin\CreditBookItem
 *
 * @property int $id
 * @property int $credit_book_id
 * @property string $vdate
 * @property string $purpose
 * @property string $credit
 * @property string $debit
 * @property string $interest
 * @property string|null $active_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin\CreditBook $creditBook
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereCreditBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditBookItem whereVdate($value)
 * @mixin \Eloquent
 */
class CreditBookItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function creditBook(): BelongsTo
    {
        return $this->belongsTo(CreditBook::class);
    }
}
