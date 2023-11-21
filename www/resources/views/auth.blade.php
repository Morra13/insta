@extends('layouts.app', ['title' => 'Авторизация'])

@section('content')
    <section class="auth">
        <div class="container reg__container flex">
            <form method="post" action="{{ route(\App\Http\Controllers\Auth\AuthController::ROUTE_AUTH) }}" class="form flex">
                <h3 class="reg__subtitle">
                    Авторизация
                </h3>
                <input type="email" name="email" id="email" class="reg__input input-reset" placeholder="Email" required>
                <input type="password" name="password" id="password" class="reg__input input-reset" placeholder="Password" required>
                <div class="reg__sending flex">
                    <button class="btn btn-reset reg__btn_accent">
                        Авторизация
                    </button>
                    <a href="{{ route(\App\Http\Controllers\PublicController::ROUTE_REGISTER) }}" class="reg__link">Регистрация</a>
                </div>
            </form>
        </div>
    </section>
@endsection
