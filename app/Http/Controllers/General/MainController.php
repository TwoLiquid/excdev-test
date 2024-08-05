<?php

namespace App\Http\Controllers\General;

use App\Contracts\Controllers\General\MainControllerInterface;
use App\Contracts\Repositories\User\UserBalanceOperationRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class MainController
 *
 * @package App\Http\Controllers\Main
 */
final class MainController extends Controller implements MainControllerInterface
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

        $userBalanceOperations = $this->userBalanceOperationRepository->getLast(userBalance: $userBalance);

        return view('pages.dashboard.index', [
            'balance'    => $userBalance->amount,
            'operations' => $userBalanceOperations
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('main.index');
    }
}
