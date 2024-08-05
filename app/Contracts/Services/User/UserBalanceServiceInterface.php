<?php

namespace App\Contracts\Services\User;

use App\Models\User\UserBalance;

/**
 * Interface UserBalanceServiceInterface
 *
 * @package App\Contracts\Services\User
 */
interface UserBalanceServiceInterface
{
    /**
     * @param UserBalance $userBalance
     * @param float $amount
     *
     * @return UserBalance
     */
    public function increase(UserBalance $userBalance, float $amount): UserBalance;

    /**
     * @param UserBalance $userBalance
     * @param float $amount
     *
     * @return UserBalance
     */
    public function decrease(UserBalance $userBalance, float $amount): UserBalance;
}
