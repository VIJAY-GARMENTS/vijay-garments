<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DefaultCompany extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * @var \Closure|\Illuminate\Support\HigherOrderCollectionProxy|mixed|object|null
     */
//    public  $tenant_id;

    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }


}
