<?php

namespace Aaran\Taskmanager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Taskmanager\BankStatementEntry
 *
 * @property int $id
 * @property int $client_banks_id
 * @property string|null $entry
 * @property string|null $remarks
 * @property string|null $status_id
 * @property int $user_id
 * @property string|null $active_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereActiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereClientBanksId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereEntry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankStatementEntry whereUserId($value)
 * @mixin \Eloquent
 */
class BankStatementEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
           : static::where('entry', 'like', '%' . $searches . '%');
    }

}
