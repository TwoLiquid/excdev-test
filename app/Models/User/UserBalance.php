<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Eloquent;

/**
 * App\Models\User\UserBalance
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, UserBalanceOperation> $operations
 * @property-read int|null $operations_count
 * @property-read User $user
 * @method static Builder|UserBalance newModelQuery()
 * @method static Builder|UserBalance newQuery()
 * @method static Builder|UserBalance onlyTrashed()
 * @method static Builder|UserBalance query()
 * @method static Builder|UserBalance whereAmount($value)
 * @method static Builder|UserBalance whereCreatedAt($value)
 * @method static Builder|UserBalance whereDeletedAt($value)
 * @method static Builder|UserBalance whereId($value)
 * @method static Builder|UserBalance whereUpdatedAt($value)
 * @method static Builder|UserBalance whereUserId($value)
 * @method static Builder|UserBalance withTrashed()
 * @method static Builder|UserBalance withoutTrashed()
 * @mixin Eloquent
 */
class UserBalance extends Model
{
    use SoftDeletes;

    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'user_balances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount'
    ];

    //--------------------------------------------------------------------------
    // Belongs to relations

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //--------------------------------------------------------------------------
    // Has many relations

    /**
     * @return HasMany
     */
    public function operations(): HasMany
    {
        return $this->hasMany(
            UserBalanceOperation::class,
            'balance_id',
            'id'
        );
    }
}
