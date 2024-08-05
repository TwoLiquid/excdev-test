<?php

namespace App\Repositories\User;

use App\Contracts\Repositories\User\UserRepositoryInterface;
use App\Exceptions\Repository\RepositoryException;
use App\Models\User\User;
use App\Repositories\BaseRepository;
use App\Support\Repository\ExceptionTrait;
use App\Support\Repository\InitializeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Exception;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use InitializeTrait, ExceptionTrait;

    /**
     * @param int|null $id
     *
     * @return User|null
     *
     * @throws RepositoryException
     */
    public function findById(?int $id): ?User
    {
        try {
            return User::find($id);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param int|null $id
     *
     * @return User|null
     *
     * @throws RepositoryException
     */
    public function findFullById(?int $id): ?User
    {
        try {
            return User::query()
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
     * @param string $email
     *
     * @return User|null
     *
     * @throws RepositoryException
     */
    public function findByEmail(string $email): ?User
    {
        try {
            return User::query()
                ->with([
                    'balance'
                ])
                ->where('email', '=', trim($email))
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
            return User::all();
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
            return User::query()
                ->paginate($perPage ?: $this->perPage, ['*'], 'page', $page);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User|null
     *
     * @throws RepositoryException
     */
    public function store(string $name, string $email, string $password): ?User
    {
        try {
            return User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => $password
            ]);
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }

    /**
     * @param User $user
     * @param bool $force
     *
     * @return bool
     *
     * @throws RepositoryException
     */
    public function delete(User $user, bool $force = false): bool
    {
        try {
            if ($force === true) {
                return $user->forceDelete();
            }

            return $user->delete();
        } catch (Exception) {
            throw new RepositoryException(
                $this->getExceptionMessage(__FUNCTION__)
            );
        }
    }
}
