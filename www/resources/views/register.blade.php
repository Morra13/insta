@extends('layouts.app', ['title' => 'Регистрация'])

@section('content')
    <section class="reg">
        <div class="container reg__container flex">
            <form method="post" action="{{ route(\App\Http\Controllers\Auth\RegisterController::ROUTE_REGISTER) }}" class="form flex">
                <h3 class="reg__subtitle">
                    Регистрация
                </h3>
                <input type="email" name="email" id="email" class="reg__input input-reset" placeholder="Email" required>
                <input type="password" name="password" id="password" class="reg__input input-reset" placeholder="Password" required>
                <div class="reg__sending flex">
                    <button class="btn btn-reset reg__btn_accent">
                        Регистрация
                    </button>
                    <a href="{{ route(\App\Http\Controllers\PublicController::ROUTE_AUTH) }}" class="reg__link">Авторизация</a>
                </div>
            </form>
        </div>
    </section>
@endsection
