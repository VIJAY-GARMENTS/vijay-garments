<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\{City, Pincode, State};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\Aaran\Master\Models\_IH_Contact_QB;

class Contact_detail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function printDetails($ids): Collection
    {
        $obj = self::find($ids);

        return collect([
            'contact_name' => $obj->vname,
            'address_1' => $obj->address_1 . ', ' . $obj->address_area,
            'address_2' => $obj->address_2,
            'address_3' => $obj->city->vname . ' - ' . $obj->pincode->vname . '.  ' . $obj->state->vname . ' - ' . $obj->state->state_code,
            'gstcell' =>  'GSTin : '.$obj->gstin,

        ]);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function pincode(): BelongsTo
    {
        return $this->belongsTo(Pincode::class);
    }

}
