<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /** @var string  */
    const ROUTE_REGISTER = 'api.auth.register';

    /**
     * Регистрация пользователя
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register (Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route(\App\Http\Controllers\PublicController::ROUTE_INDEX);
    }

}
