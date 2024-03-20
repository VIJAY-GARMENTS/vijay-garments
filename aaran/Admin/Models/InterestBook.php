<?php

namespace Aaran\Admin\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Admin\InterestBook
 *
 * @property int $id
 * @property int $credit_book_id
 * @property string $vdate
 * @property string $interest
 * @property string $received
 * @property string $received_date
 * @property string $remarks
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Admin\CreditBook $creditBook
 * @method static Builder|InterestBook newModelQuery()
 * @method static Builder|InterestBook newQuery()
 * @method static Builder|InterestBook query()
 * @method static Builder|InterestBook whereCreatedAt($value)
 * @method static Builder|InterestBook whereCreditBookId($value)
 * @method static Builder|InterestBook whereId($value)
 * @method static Builder|InterestBook whereInterest($value)
 * @method static Builder|InterestBook whereReceived($value)
 * @method static Builder|InterestBook whereReceivedDate($value)
 * @method static Builder|InterestBook whereRemarks($value)
 * @method static Builder|InterestBook whereUpdatedAt($value)
 * @method static Builder|InterestBook whereUserId($value)
 * @method static Builder|InterestBook whereVdate($value)
 * @mixin \Eloquent
 */
class InterestBook extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function creditBook(): BelongsTo
    {
        return $this->belongsTo(CreditBook::class);
    }
}
