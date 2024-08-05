<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Eloquent;

/**
 * App\Models\User\UserBalanceOperation
 *
 * @property int $id
 * @property int $balance_id
 * @property string $type
 * @property float $amount
 * @property float $total
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \App\Models\User\UserBalance|null $balance
 * @method static Builder|UserBalanceOperation newModelQuery()
 * @method static Builder|UserBalanceOperation newQuery()
 * @method static Builder|UserBalanceOperation onlyTrashed()
 * @method static Builder|UserBalanceOperation query()
 * @method static Builder|UserBalanceOperation whereAmount($value)
 * @method static Builder|UserBalanceOperation whereBalanceId($value)
 * @method static Builder|UserBalanceOperation whereCreatedAt($value)
 * @method static Builder|UserBalanceOperation whereDeletedAt($value)
 * @method static Builder|UserBalanceOperation whereDescription($value)
 * @method static Builder|UserBalanceOperation whereId($value)
 * @method static Builder|UserBalanceOperation whereTotal($value)
 * @method static Builder|UserBalanceOperation whereType($value)
 * @method static Builder|UserBalanceOperation whereUpdatedAt($value)
 * @method static Builder|UserBalanceOperation withTrashed()
 * @method static Builder|UserBalanceOperation withoutTrashed()
 * @mixin Eloquent
 */
class UserBalanceOperation extends Model
{
    use SoftDeletes;

    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'user_balance_operations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance_id', 'type', 'amount', 'total', 'description'
    ];

    //--------------------------------------------------------------------------
    // Belongs to relations

    /**
     * @return BelongsTo
     */
    public function balance(): BelongsTo
    {
        return $this->belongsTo(
            UserBalance::class,
            'user_id',
            'id'
        );
    }
}
