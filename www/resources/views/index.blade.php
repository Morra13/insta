@extends('layouts.app', ['title' => __('Главная страница')])

@section('content')
        <div class="container header__container flex">
            <nav class="nav">
                <ul class="nav__list list-reset flex">
                    <li class="nav__item">
                        <a href="{{ route(\App\Http\Controllers\Auth\AuthController::ROUTE_LOGOUT) }}" class="nav__link">
                            Выход
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <table class="table">
                <tr>
                    <th class="table__borders">valuteID</th>
                    <th class="table__borders">numCode</th>
                    <th class="table__borders">сharCode</th>
                    <th class="table__borders">name</th>
                    <th class="table__borders">value</th>
                    <th class="table__borders">date</th>
                </tr>
                @include('layouts.columns')
            </table>
        </div>
@endsection
