<?php

namespace App\Http\Controllers\General;

use App\Contracts\Controllers\General\HistoryControllerInterface;
use App\Contracts\Repositories\User\UserBalanceOperationRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\History\FilterRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class HistoryController
 *
 * @package App\Http\Controllers\Main
 */
final class HistoryController extends Controller implements HistoryControllerInterface
{
    /**
     * MainController constructor
     *
     * @param UserBalanceOperationRepositoryInterface $userBalanceOperationRepository
     */
    public function __construct(protected UserBalanceOperationRepositoryInterface $userBalanceOperationRepository) {}

    /**
     * @return View
     */
    public function index(): View
    {
        $userBalance = Auth::user()->balance;

        $userBalanceOperations = $this->userBalanceOperationRepository->getByBalance(userBalance: $userBalance);

        return view('pages.dashboard.history', [
            'operations' => $userBalanceOperations
        ]);
    }

    /**
     * @param FilterRequest $request
     *
     * @return Collection
     */
    public function filter(FilterRequest $request): Collection
    {
        return $this->userBalanceOperationRepository->getByBalance(
            userBalance: Auth::user()->balance,
            order: $request->order,
            search: $request->search,
            limit: $request->limit
        );
    }
}
