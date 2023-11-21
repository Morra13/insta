<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /** @var string  */
    const ROUTE_AUTH = 'api.auth.auth';

    /** @var string  */
    const ROUTE_LOGOUT = 'api.auth.logout';

    /**
     * Авторизация
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route(\App\Http\Controllers\PublicController::ROUTE_INDEX);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Выход
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout (Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route(\App\Http\Controllers\PublicController::ROUTE_INDEX);
    }
}
