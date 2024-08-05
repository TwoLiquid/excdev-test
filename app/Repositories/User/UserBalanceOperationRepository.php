<?php

namespace App\Repositories\User;

use App\Contracts\Repositories\User\UserBalanceOperationRepositoryInterface;
use App\Exceptions\Repository\RepositoryException;
use App\Models\User\UserBalance;
use App\Models\User\UserBalanceOperation;
use App\Repositories\BaseRepository;
use App\Support\Repository\ExceptionTrait;
use App\Support\Repository\InitializeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Exception;

/**
 * Class UserBalanceOperationRepository
 *
 * @package App\Repositories\User
 */
class UserBalanceOperationRepository extends BaseRepository implements UserBalanceOperationRepositoryInterface
{
    use InitializeTrait, ExceptionTrait;

    /**
     * @param int|null $id
     *
     * @return UserBalanceOperation|null
     *
     * @throws RepositoryException
     */
    public function findById(?int $id): ?UserBalanceOperation
    {
        try {
            return UserBalanceOperation::find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param int|null $id
     *
     * @return UserBalanceOperation|null
     *
     * @throws RepositoryException
     */
    public function findFullById(?int $id): ?UserBalanceOperation
    {
        try {
            return UserBalanceOperation::query()
                ->find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @return Collection
     *
     * @throws RepositoryException
     */
    public function getAll(): Collection
    {
        try {
            return UserBalanceOperation::all();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     *
     * @throws RepositoryException
     */
    public function getAllPaginated(?int $page = null, ?int $perPage = null): LengthAwarePaginator
    {
        try {
            return UserBalanceOperation::query()
                ->paginate($perPage ?: $this->perPage, ['*'], 'page', $page);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalance $userBalance
     * @param int $limit
     *
     * @return Collection
     *
     * @throws RepositoryException
     */
    public function getLast(UserBalance $userBalance, int $limit = 5): Collection
    {
        try {
            return UserBalanceOperation::query()
                ->where('balance_id', '=', $userBalance->id)
                ->orderBy('created_at', 'desc')
                ->limit($limit)
                ->get();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalance $userBalance
     * @param string|null $order
     * @param string|null $search
     * @param int|null $limit
     *
     * @return Collection
     *
     * @throws RepositoryException
     */
    public function getByBalance(
        UserBalance $userBalance,
        ?string $order = null,
        ?string $search = null,
        ?int $limit = null
    ): Collection {
        try {
            return UserBalanceOperation::query()
                ->where('balance_id', '=', $userBalance->id)
                ->when($order, function (Builder $query) use ($order) {
                    $query->orderBy('created_at', $order);
                })
                ->when($search, function (Builder $query) use ($search) {
                    $query->where('description', 'LIKE', '%' . $search . '%');
                })
                ->when($limit, function (Builder $query) use ($limit) {
                    $query->limit($limit);
                })
                ->get();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalance $userBalance
     * @param string $type
     * @param float $amount
     * @param float $total
     * @param string|null $description
     *
     * @return UserBalanceOperation|null
     *
     * @throws RepositoryException
     */
    public function store(
        UserBalance $userBalance,
        string $type,
        float $amount,
        float $total,
        ?string $description = null
    ): ?UserBalanceOperation {
        try {
            return UserBalanceOperation::create([
                'balance_id'  => $userBalance->id,
                'type'        => $type,
                'amount'      => $amount,
                'total'       => $total,
                'description' => $description
            ]);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalanceOperation $userBalanceOperation
     * @param bool $force
     *
     * @return bool
     *
     * @throws RepositoryException
     */
    public function delete(UserBalanceOperation $userBalanceOperation, bool $force = false): bool
    {
        try {
            if ($force === true) {
                return $userBalanceOperation->forceDelete();
            }

            return $userBalanceOperation->delete();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }
}
