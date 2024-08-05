<?php

namespace App\Contracts\Services\User;

use App\Models\User\User;

/**
 * Interface UserServiceInterface
 *
 * @package App\Contracts\Services\User
 */
interface UserServiceInterface
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    public function create(string $name, string $email, string $password): User;
}
