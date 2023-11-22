@extends('layouts.app', ['title' => __('Главная страница')])

@section('content')
        <div class="container header__container flex">
            <nav class="nav">
                <ul class="nav__list list-reset flex">
                    <li class="nav__item">
                        <form method="post" action="{{ route(\App\Http\Controllers\Api\CurrencyController::ROUTE_PARSE_CURRENCY) }}">
                            <button class="nav__link btn-reset" disabled>
                                Спарсить данные
                            </button>
                        </form>
                    </li>
                    <li class="nav__item">
                        <form method="post" action="{{ route(\App\Http\Controllers\Api\CurrencyController::ROUTE_DELETE_ALL) }}">
                            <button class="nav__link btn-reset" disabled>
                                Удалить данные
                            </button>
                        </form>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route(\App\Http\Controllers\Auth\AuthController::ROUTE_LOGOUT) }}" class="nav__link">
                            Выход
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="div__clear">
                <form method="get" action="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">
                    <label for="date">Курсы за дату</label>
                    <input class="input__date btn-reset" type="date" name="date" id="date" value="{{ $date }}">
                    <button class="btn btn-reset reg__btn_accent btn__check">
                        Смотреть
                    </button>
                </form>
            </div>
            <div class="table__block flex">
                <table class="table">
                    <tr class="table__tr">
                        <th class="table__th">valuteID</th>
                        <th class="table__th">numCode</th>
                        <th class="table__th">сharCode</th>
                        <th class="table__th">name</th>
                        <th class="table__th">value</th>
                        <th class="table__th">date</th>
                    </tr>
                    @foreach($arCurrency as $value)
                        @include('layouts.columns', ['currency' => $value])
                    @endforeach
                </table>
                <form method="get" action="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}" class="form__table flex">
                    <label for="valuteID">ID</label>
                    <input type="text" name="valuteID" id="valuteID" class="reg__input input-reset input__id" required>
                    <label for="dateFrom">От</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="input__date btn-reset" value="{{ $_GET['dateFrom'] ?? $dateMin }}" required>
                    <label for="dateTo">До</label>
                    <input type="date" name="dateTo" id="dateTo" class="input__date btn-reset" value="{{ $_GET['dateTo'] ?? $dateMax }}" required>
                    <button class="btn btn-reset reg__btn_accent btn__check">
                        Смотреть
                    </button>
                </form>
            </div>

            @if(!empty($_GET['valuteID']) || !empty($_GET['date']))
                <div class="div__clear">
                    <a class="nav__link" href="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">Очистить</a>
                </div>
            @endif
        </div>
@endsection
