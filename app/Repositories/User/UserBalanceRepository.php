<?php

namespace App\Repositories\User;

use App\Contracts\Repositories\User\UserBalanceRepositoryInterface;
use App\Exceptions\Repository\RepositoryException;
use App\Models\User\User;
use App\Models\User\UserBalance;
use App\Repositories\BaseRepository;
use App\Support\Repository\ExceptionTrait;
use App\Support\Repository\InitializeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Exception;

/**
 * Class UserBalanceRepository
 *
 * @package App\Repositories\User
 */
class UserBalanceRepository extends BaseRepository implements UserBalanceRepositoryInterface
{
    use InitializeTrait, ExceptionTrait;

    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     *
     * @throws RepositoryException
     */
    public function findById(?int $id): ?UserBalance
    {
        try {
            return UserBalance::find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param int|null $id
     *
     * @return UserBalance|null
     *
     * @throws RepositoryException
     */
    public function findFullById(?int $id): ?UserBalance
    {
        try {
            return UserBalance::query()
                ->with([
                    //
                ])
                ->find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param User $user
     *
     * @return UserBalance|null
     *
     * @throws RepositoryException
     */
    public function findByUser(User $user): ?UserBalance
    {
        try {
            return UserBalance::query()
                ->where('user_id', '=', $user->id)
                ->first();
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
            return UserBalance::all();
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
            return UserBalance::query()
                ->paginate($perPage ?: $this->perPage, ['*'], 'page', $page);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param User $user
     * @param int $amount
     *
     * @return UserBalance|null
     *
     * @throws RepositoryException
     */
    public function store(User $user, int $amount = 0): ?UserBalance
    {
        try {
            return UserBalance::create([
                'user_id' => $user->id,
                'amount'  => $amount
            ]);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalance $userBalance
     * @param int $amount
     *
     * @return UserBalance|null
     *
     * @throws RepositoryException
     */
    public function updateAmount(UserBalance $userBalance, int $amount): ?UserBalance
    {
        try {
            $userBalance->update([
                'amount' => $amount
            ]);

            return $userBalance;
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param UserBalance $userBalance
     * @param bool $force
     *
     * @return bool
     *
     * @throws RepositoryException
     */
    public function delete(UserBalance $userBalance, bool $force = false): bool
    {
        try {
            if ($force === true) {
                return $userBalance->forceDelete();
            }

            return $userBalance->delete();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }
}
