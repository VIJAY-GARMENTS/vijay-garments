<?php

namespace Aaran\Audit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\ClientBank
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $vname
 * @property string|null $acno
 * @property string|null $ifsc
 * @property string|null $bank
 * @property string|null $branch
 * @property string|null $customer_id
 * @property string|null $customer_id2
 * @property string|null $pks
 * @property string|null $trs
 * @property string|null $profileps
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $dvcatm
 * @property string|null $active_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master\Client $client
 * @property-read User $user
 * @method static Builder|ClientBank newModelQuery()
 * @method static Builder|ClientBank newQuery()
 * @method static Builder|ClientBank query()
 * @method static Builder|ClientBank whereAcno($value)
 * @method static Builder|ClientBank whereActiveId($value)
 * @method static Builder|ClientBank whereBank($value)
 * @method static Builder|ClientBank whereBranch($value)
 * @method static Builder|ClientBank whereClientId($value)
 * @method static Builder|ClientBank whereCreatedAt($value)
 * @method static Builder|ClientBank whereCustomerId($value)
 * @method static Builder|ClientBank whereCustomerId2($value)
 * @method static Builder|ClientBank whereDvcatm($value)
 * @method static Builder|ClientBank whereEmail($value)
 * @method static Builder|ClientBank whereId($value)
 * @method static Builder|ClientBank whereIfsc($value)
 * @method static Builder|ClientBank whereMobile($value)
 * @method static Builder|ClientBank wherePks($value)
 * @method static Builder|ClientBank whereProfileps($value)
 * @method static Builder|ClientBank whereTrs($value)
 * @method static Builder|ClientBank whereUpdatedAt($value)
 * @method static Builder|ClientBank whereUserId($value)
 * @method static Builder|ClientBank whereVname($value)
 * @mixin \Eloquent
 */
class ClientBank extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
