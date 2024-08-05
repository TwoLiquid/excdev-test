<?php

namespace App\Console\Commands\User\Balance\Operation;

use App\Contracts\Repositories\User\UserRepositoryInterface;
use App\Exceptions\Repository\RepositoryException;
use App\Jobs\User\UserBalanceChangeJob;
use App\Repositories\User\UserRepository;
use Illuminate\Console\Command;
use Throwable;

/**
 * Class UserBalanceOperationCreateCommand
 *
 * @package App\Console\Commands\User\Balance\Operation
 */
class UserBalanceOperationCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:balance {--user=twoliquid@gmail.com} {--type=increase} {--amount=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User create command.';

    /**
     * @var array
     */
    protected array $descriptions = [
        'increase' => 'Balance has been increased.',
        'decrease' => 'Balance has been decreased.'
    ];

    /**
     * Execute the console command.
     *
     * @return int
     *
     * @throws RepositoryException
     * @throws Throwable
     */
    public function handle(): int
    {
        /** @var UserRepository $userRepository */
        $userRepository = app(UserRepositoryInterface::class);

        $type = $this->option('type');

        if (!in_array($type, ['increase', 'decrease'])) {
            $this->error('Wrong type.');

            return 0;
        }

        $user = $userRepository->findByEmail(email: $this->option('user'));

        if (!$user) {
            $this->error('Failed to find a user.');

            return 0;
        }

        UserBalanceChangeJob::dispatch(
            userBalance: $user->balance,
            type: $type,
            amount: $this->option('amount'),
            description: $this->descriptions[$type]
        );

        return 1;
    }
}
