<?php

namespace Aaran\Magalir\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Magalir\MgPassbook
 *
 * @property int $id
 * @property int $mg_club_id
 * @property int $mg_member_id
 * @property int $mg_loan_id
 * @property string $due_date
 * @property string $due_amount
 * @property string|null $received_date
 * @property string $received
 * @property string|null $remarks
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Magalir\MgClub $mgClub
 * @property-read \App\Models\Magalir\MgLoan $mgLoan
 * @property-read \App\Models\Magalir\MgMember $mgMember
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook query()
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereMgClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereMgLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereMgMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgPassbook whereUserId($value)
 * @mixin \Eloquent
 */
class MgPassbook extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
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
