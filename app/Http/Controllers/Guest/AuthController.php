<?php

namespace App\Http\Controllers\Guest;

use App\Contracts\Controllers\Guest\AuthControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Guest
 */
final class AuthController extends Controller implements AuthControllerInterface
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.login');
    }

    /**
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt([
            'email'    => $request->input('login'),
            'password' => $request->input('password')
        ])) {
            $request->session()->regenerate();

            return redirect()->route('main.index');
        }

        return back()->withErrors([
            'password' => 'The provided password is wrong.'
        ]);
    }
}
