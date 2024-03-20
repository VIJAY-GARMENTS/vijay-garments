<?php

namespace Aaran\Audit\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\BankBalance
 *
 * @property int $id
 * @property int $client_bank_id
 * @property string $cdate
 * @property string $balance
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master\ClientBank $clientBank
 * @method static Builder|BankBalance newModelQuery()
 * @method static Builder|BankBalance newQuery()
 * @method static Builder|BankBalance query()
 * @method static Builder|BankBalance whereBalance($value)
 * @method static Builder|BankBalance whereCdate($value)
 * @method static Builder|BankBalance whereClientBankId($value)
 * @method static Builder|BankBalance whereCreatedAt($value)
 * @method static Builder|BankBalance whereId($value)
 * @method static Builder|BankBalance whereUpdatedAt($value)
 * @method static Builder|BankBalance whereUserId($value)
 * @mixin \Eloquent
 */
class BankBalance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function clientBank(): BelongsTo
    {
        return $this->belongsTo(ClientBank::class);
    }
}
