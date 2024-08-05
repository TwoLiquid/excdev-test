<?php

namespace App\Contracts\Controllers\General;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Interface MainControllerInterface
 *
 * @package App\Contracts\Controllers\General
 */
interface MainControllerInterface
{
    /**
     * @return View
     */
    public function index(): View;

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse;
}
