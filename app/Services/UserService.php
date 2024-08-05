<?php

namespace App\Services;

use App\Contracts\Repositories\User\UserBalanceRepositoryInterface;
use App\Contracts\Repositories\User\UserRepositoryInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    /**
     * UserService constructor
     *
     * @param UserRepositoryInterface $userRepository
     * @param UserBalanceRepositoryInterface $userBalanceRepository
     */
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected UserBalanceRepositoryInterface $userBalanceRepository
    ) {}

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User
     *
     * @throws Exception
     * @throws Throwable
     */
    public function create(string $name, string $email, string $password): User
    {
        $user = $this->userRepository->findByEmail(email: $email);

        if ($user) {
            throw new Exception('User already exists!', 422);
        }

        DB::beginTransaction();

        try {

            $user = $this->userRepository->store(name: $name, email: $email, password: $password);
            $this->userBalanceRepository->store(user: $user);

            DB::commit();
        } catch (Exception) {
            DB::rollBack();

            throw new Exception('Failed to create a user!', 422);
        }

        return $user;
    }
}
