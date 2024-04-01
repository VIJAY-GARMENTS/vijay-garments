<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\Aaran\Master\Models\_IH_Company_QB;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches): Company|Builder|_IH_Company_QB
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public static function printDetails($ids): Collection
    {
        $obj = self::find($ids);

        return collect([
            'company_name' => $obj->display_name,
            'address_1' => $obj->address_1 . ', ' . $obj->address_2 . ' - ' . $obj->city->vname . ' - ' . $obj->pincode->vname . '.',
            'address_2' => 'GSTin - ' . $obj->gstin . ', Mobile - ' . $obj->mobile,
            'email'=>$obj->email,
            'logo'=>$obj->logo,
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
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
