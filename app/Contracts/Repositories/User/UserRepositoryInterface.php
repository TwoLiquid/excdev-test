<?php

namespace App\Contracts\Repositories\User;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Contracts\Repositories\User
 */
interface UserRepositoryInterface
{
    /**
     * @param int|null $id
     *
     * @return User|null
     */
    public function findById(?int $id): ?User;

    /**
     * @param int|null $id
     *
     * @return User|null
     */
    public function findFullById(?int $id): ?User;

    /**
     * @param string $email
     *
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

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
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User|null
     */
    public function store(string $name, string $email, string $password): ?User;

    /**
     * @param User $user
     * @param bool $force
     *
     * @return bool
     */
    public function delete(User $user, bool $force): bool;
}
