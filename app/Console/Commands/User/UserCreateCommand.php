<?php

namespace App\Console\Commands\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Console\Command;
use Exception;
use Throwable;

/**
 * Class UserCreateCommand
 *
 * @package App\Console\Commands\User
 */
class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--name=test} {--email=test} {--password=test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User create command.';

    /**
     * Execute the console command.
     *
     * @return int
     *
     * @throws Throwable
     */
    public function handle(): int
    {
        /** @var UserService $userService */
        $userService = app(UserServiceInterface::class);

        try {
            $userService->create(
                name: $this->option('name'),
                email: $this->option('email'),
                password: $this->option('password')
            );
        } catch (Exception $exception) {
            $this->error($exception->getMessage());

            return 0;
        }

        $this->info('User has been successfully created!');

        return 1;
    }
}
