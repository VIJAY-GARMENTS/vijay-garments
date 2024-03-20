<?php

namespace Aaran\Audit\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master\ClientDetail
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $vname
 * @property string|null $mobile
 * @property string|null $whatsapp
 * @property string|null $email
 * @property string|null $gstin
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $pincode
 * @property string|null $gst_user
 * @property string|null $gst_pass
 * @property string|null $einvoice_user
 * @property string|null $einvoice_pass
 * @property string|null $eway_user
 * @property string|null $eway_pass
 * @property string|null $einvoice_api
 * @property string|null $einvoice_api_pass
 * @property string|null $eway_api
 * @property string|null $eway_api_pass
 * @property string|null $acc_email
 * @property string|null $acc_email_pass
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master\Client $client
 * @method static Builder|ClientDetail newModelQuery()
 * @method static Builder|ClientDetail newQuery()
 * @method static Builder|ClientDetail query()
 * @method static Builder|ClientDetail whereAccEmail($value)
 * @method static Builder|ClientDetail whereAccEmailPass($value)
 * @method static Builder|ClientDetail whereAddress1($value)
 * @method static Builder|ClientDetail whereAddress2($value)
 * @method static Builder|ClientDetail whereCity($value)
 * @method static Builder|ClientDetail whereClientId($value)
 * @method static Builder|ClientDetail whereCreatedAt($value)
 * @method static Builder|ClientDetail whereEinvoiceApi($value)
 * @method static Builder|ClientDetail whereEinvoiceApiPass($value)
 * @method static Builder|ClientDetail whereEinvoicePass($value)
 * @method static Builder|ClientDetail whereEinvoiceUser($value)
 * @method static Builder|ClientDetail whereEmail($value)
 * @method static Builder|ClientDetail whereEwayApi($value)
 * @method static Builder|ClientDetail whereEwayApiPass($value)
 * @method static Builder|ClientDetail whereEwayPass($value)
 * @method static Builder|ClientDetail whereEwayUser($value)
 * @method static Builder|ClientDetail whereGstPass($value)
 * @method static Builder|ClientDetail whereGstUser($value)
 * @method static Builder|ClientDetail whereGstin($value)
 * @method static Builder|ClientDetail whereId($value)
 * @method static Builder|ClientDetail whereMobile($value)
 * @method static Builder|ClientDetail wherePincode($value)
 * @method static Builder|ClientDetail whereState($value)
 * @method static Builder|ClientDetail whereUpdatedAt($value)
 * @method static Builder|ClientDetail whereVname($value)
 * @method static Builder|ClientDetail whereWhatsapp($value)
 * @mixin \Eloquent
 */
class ClientDetail extends Model
{
    use HasFactory;
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
