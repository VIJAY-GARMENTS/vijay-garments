<?php

namespace Aaran\Taskmanager\Models;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taskmanager\Gstcredit
 *
 * @property int $id
 * @property int $client_id
 * @property string $month
 * @property string $year
 * @property string|null $opening_igst
 * @property string|null $opening_cgst
 * @property string|null $opening_sgst
 * @property string|null $sales_igst
 * @property string|null $sales_cgst
 * @property string|null $sales_sgst
 * @property string|null $purchase_igst
 * @property string|null $purchase_cgst
 * @property string|null $purchase_sgst
 * @property string|null $remarks
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereOpeningCgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereOpeningIgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereOpeningSgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit wherePurchaseCgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit wherePurchaseIgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit wherePurchaseSgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereSalesCgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereSalesIgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereSalesSgst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gstcredit whereYear($value)
 * @mixin \Eloquent
 */
class Gstcredit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
