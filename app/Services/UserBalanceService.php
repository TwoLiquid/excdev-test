<?php

namespace App\Services;

use App\Contracts\Repositories\User\UserBalanceRepositoryInterface;
use App\Contracts\Services\User\UserBalanceServiceInterface;
use App\Models\User\UserBalance;
use Exception;

/**
 * Class UserBalanceService
 *
 * @package App\Services
 */
class UserBalanceService implements UserBalanceServiceInterface
{
    /**
     * UserBalanceService constructor
     *
     * @param UserBalanceRepositoryInterface $userBalanceRepository
     */
    public function __construct(
        protected UserBalanceRepositoryInterface $userBalanceRepository
    ) {}

    /**
     * @param UserBalance $userBalance
     * @param float $amount
     *
     * @return UserBalance
     */
    public function increase(UserBalance $userBalance, float $amount): UserBalance
    {
        return $this->userBalanceRepository->updateAmount(
            $userBalance,
            array_sum([
                $userBalance->amount,
                $amount
            ])
        );
    }

    /**
     * @param UserBalance $userBalance
     * @param float $amount
     *
     * @return UserBalance
     *
     * @throws Exception
     */
    public function decrease(UserBalance $userBalance, float $amount): UserBalance
    {
        if (($userBalance->amount - $amount) < 0) {
            throw new Exception('Not enough funds!', 422);
        }

        return $this->userBalanceRepository->updateAmount(
            $userBalance,
            $userBalance->amount - $amount
        );
    }
}
