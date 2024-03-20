<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taskmanager\PaymentSlip
 *
 * @property int $id
 * @property int|null $serial
 * @property int|null $group
 * @property int|null $sender_id
 * @property int|null $receiver_id
 * @property string|null $due
 * @property string|null $amount
 * @property string|null $paid
 * @property string|null $paidOn
 * @property string|null $active_id
 * @property string|null $status
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client|null $receiver
 * @property-read Client|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip wherePaidOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSlip whereUserId($value)
 * @mixin \Eloquent
 */
class PaymentSlip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('sender', 'like', '%' . $searches . '%');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
