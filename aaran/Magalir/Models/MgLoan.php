<?php

namespace Aaran\Magalir\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Magalir\MgLoan
 *
 * @property int $id
 * @property int $mg_club_id
 * @property int $mg_member_id
 * @property string $ac_no
 * @property string $open_date
 * @property string $loan
 * @property string $interest
 * @property string $dues
 * @property string $due_amount
 * @property string $due_date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Magalir\MgClub $mgClub
 * @property-read MgLoan|null $mgLoan
 * @property-read \App\Models\Magalir\MgMember $mgMember
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan query()
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereAcNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereDues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereMgClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereMgMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereOpenDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgLoan whereUserId($value)
 * @mixin \Eloquent
 */
class MgLoan extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('ac_no', 'like', '%' . $searches . '%');
    }

    public function mgClub(): BelongsTo
    {
        return $this->belongsTo(MgClub::class);
    }

    public function mgMember(): BelongsTo
    {
        return $this->belongsTo(MgMember::class);
    }

    public function mgLoan(): BelongsTo
    {
        return $this->belongsTo(MgLoan::class);
    }
}
