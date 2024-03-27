<?php

namespace Aaran\Entries\Models;

use Aaran\Common\Models\Ledger;
use Aaran\Common\Models\Transport;
use Aaran\Entries\Database\Factories\SaleFactory;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Orders\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
            : static::where('invoice_no', 'like', '%' . $searches . '%');
    }

    public static function nextNo()
    {
        return static::where('company_id','=',session()->get('company_id'))->max('invoice_no') + 1;
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }
    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }
    protected static function newFactory():SaleFactory
    {
        return new SaleFactory();
    }
}
