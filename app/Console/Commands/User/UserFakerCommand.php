<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;

/**
 * Class UserFakerCommand
 *
 * @package App\Console\Commands\User
 */
class UserFakerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:faker {--amount=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Faker user list create command.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        return 1;
    }
}
