<?php

namespace Aaran\Audit\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\ClientFee
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $month
 * @property string|null $year
 * @property string|null $invoice_no
 * @property string|null $invoice_date
 * @property string $taxable
 * @property string $gst
 * @property string $amount
 * @property string $receipt
 * @property string|null $receipt_date
 * @property string|null $receipt_ref
 * @property string|null $active_id
 * @property string $status_id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Master\Client $client
 * @method static Builder|ClientFee newModelQuery()
 * @method static Builder|ClientFee newQuery()
 * @method static Builder|ClientFee query()
 * @method static Builder|ClientFee whereActiveId($value)
 * @method static Builder|ClientFee whereAmount($value)
 * @method static Builder|ClientFee whereClientId($value)
 * @method static Builder|ClientFee whereCreatedAt($value)
 * @method static Builder|ClientFee whereGst($value)
 * @method static Builder|ClientFee whereId($value)
 * @method static Builder|ClientFee whereInvoiceDate($value)
 * @method static Builder|ClientFee whereInvoiceNo($value)
 * @method static Builder|ClientFee whereMonth($value)
 * @method static Builder|ClientFee whereReceipt($value)
 * @method static Builder|ClientFee whereReceiptDate($value)
 * @method static Builder|ClientFee whereReceiptRef($value)
 * @method static Builder|ClientFee whereStatusId($value)
 * @method static Builder|ClientFee whereTaxable($value)
 * @method static Builder|ClientFee whereUpdatedAt($value)
 * @method static Builder|ClientFee whereUserId($value)
 * @method static Builder|ClientFee whereYear($value)
 * @mixin \Eloquent
 */
class ClientFee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }
    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
