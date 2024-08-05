<?php

namespace App\Contracts\Repositories\User;

use App\Models\User\UserBalance;
use App\Models\User\UserBalanceOperation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserBalanceOperationRepositoryInterface
 *
 * @package App\Contracts\Repositories\User
 */
interface UserBalanceOperationRepositoryInterface
{
    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     */
    public function findById(?int $id): ?UserBalanceOperation;

    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     */
    public function findFullById(?int $id): ?UserBalanceOperation;

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
     * @param UserBalance $userBalance
     * @param int $limit
     *
     * @return Collection
     */
    public function getLast(UserBalance $userBalance, int $limit): Collection;

    /**
     * @param UserBalance $userBalance
     * @param string|null $order
     * @param string|null $search
     * @param int|null $limit
     *
     * @return Collection
     */
    public function getByBalance(UserBalance $userBalance, ?string $order, ?string $search, ?int $limit): Collection;

    /**
     * @param UserBalance $userBalance
     * @param string $type
     * @param float $amount
     * @param float $total
     * @param string|null $description
     *
     * @return UserBalanceOperation|null
     */
    public function store(
        UserBalance $userBalance,
        string $type,
        float $amount,
        float $total,
        ?string $description
    ): ?UserBalanceOperation;

    /**
     * @param UserBalanceOperation $userBalanceOperation
     * @param bool $force
     *
     * @return bool
     */
    public function delete(UserBalanceOperation $userBalanceOperation, bool $force): bool;
}
