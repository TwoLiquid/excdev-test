<?php

namespace App\Contracts\Repositories\User;

use App\Models\User\User;
use App\Models\User\UserBalance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserBalanceRepositoryInterface
 *
 * @package App\Contracts\Repositories\User
 */
interface UserBalanceRepositoryInterface
{
    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     */
    public function findById(?int $id): ?UserBalance;

    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     */
    public function findFullById(?int $id): ?UserBalance;

    /**
     * @return Collection
     */
    public function getAll() : Collection;

    /**
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(?int $page, ?int $perPage): LengthAwarePaginator;

    /**
     * @param User $user
     * @param int $amount
     *
     * @return UserBalance|null
     */
    public function store(User $user, int $amount): ?UserBalance;

    /**
     * @param UserBalance $userBalance
     * @param int $amount
     *
     * @return UserBalance|null
     */
    public function updateAmount(UserBalance $userBalance, int $amount): ?UserBalance;

    /**
     * @param UserBalance $userBalance
     * @param bool $force
     *
     * @return bool
     */
    public function delete(UserBalance $userBalance, bool $force): bool;
}
