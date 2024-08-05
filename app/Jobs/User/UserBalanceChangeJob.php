<?php

namespace App\Jobs\User;

use App\Contracts\Repositories\User\UserBalanceOperationRepositoryInterface;
use App\Contracts\Services\User\UserBalanceServiceInterface;
use App\Models\User\UserBalance;
use App\Repositories\User\UserBalanceOperationRepository;
use App\Services\UserBalanceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

/**
 * Class UserBalanceChangeJob
 *
 * @package App\Jobs\User
 */
class UserBalanceChangeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param UserBalance $userBalance
     * @param string $type
     * @param float $amount
     * @param string|null $description
     */
    public function __construct(
        protected UserBalance $userBalance,
        protected string $type,
        protected float $amount,
        protected ?string $description
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws Throwable
     */
    public function handle(): void
    {
        /** @var UserBalanceOperationRepository $userBalanceOperationRepository */
        $userBalanceOperationRepository = app(UserBalanceOperationRepositoryInterface::class);

        /** @var UserBalanceService $userBalanceService */
        $userBalanceService = app(UserBalanceServiceInterface::class);

        try {
            $type = $this->type;

            /** @var UserBalance $userBalance */
            $userBalance = $userBalanceService->$type(
                userBalance: $this->userBalance,
                amount: $this->amount
            );

            $userBalanceOperationRepository->store(
                userBalance: $userBalance,
                type: $type,
                amount: $this->amount,
                total: $userBalance->amount,
                description: $this->description
            );

            DB::commit();
        } catch (Exception) {
            DB::rollBack();
        }
    }
}
