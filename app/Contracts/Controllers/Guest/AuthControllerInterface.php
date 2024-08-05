<?php

namespace App\Contracts\Controllers\Guest;

use App\Http\Requests\Guest\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Interface AuthControllerInterface
 *
 * @package App\Contracts\Controllers\Guest
 */
interface AuthControllerInterface
{
    /**
     * @return View
     */
    public function index(): View;

    /**
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse;
}
