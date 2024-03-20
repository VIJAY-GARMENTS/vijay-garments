<?php

namespace Aaran\Magalir\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Magalir\MgMember
 *
 * @property int $id
 * @property int $mg_club_id
 * @property string|null $photo
 * @property string $vname
 * @property string $father
 * @property string $mother
 * @property string|null $dob
 * @property string|null $aadhaar
 * @property string|null $pan
 * @property string|null $mobile
 * @property string|null $mobile_2
 * @property string|null $email
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $pincode
 * @property string|null $nominee
 * @property string|null $n_mobile
 * @property string|null $n_aadhaar
 * @property string|null $active_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Magalir\MgClub $mgClub
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereAadhaar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereFather($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereMgClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereMobile2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereMother($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereNAadhaar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereNMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereNominee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember wherePan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MgMember whereVname($value)
 * @mixin \Eloquent
 */
class MgMember extends Model
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
}
