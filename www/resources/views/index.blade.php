@extends('layouts.app', ['title' => __('Главная страница')])

@section('content')
        <div class="container header__container flex">
            <nav class="nav">
                <ul class="nav__list list-reset flex">
                    <li class="nav__item">
                        <form method="post" action="{{ route(\App\Http\Controllers\Api\CurrencyController::ROUTE_PARSE_CURRENCY) }}">
                            <button class="nav__link btn-reset">
                                Спарсить данные
                            </button>
                        </form>
                    </li>
                    <li class="nav__item">
                        <form method="post" action="{{ route(\App\Http\Controllers\Api\CurrencyController::ROUTE_DELETE_ALL) }}">
                            <button class="nav__link btn-reset">
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
            <div>
                <form method="get" action="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">
                    <label for="date">Курсы за дату</label>
                    <input class="input__date btn-reset" type="date" name="date" id="date" value="{{ $date }}">
                    <button class="btn btn-reset reg__btn_accent btn__check">
                        Смотреть
                    </button>
                    <br><br>
                </form>
            </div>
            <div class="flex">
                <table class="table">
                    <tr>
                        <th class="table__borders">valuteID</th>
                        <th class="table__borders">numCode</th>
                        <th class="table__borders">сharCode</th>
                        <th class="table__borders">name</th>
                        <th class="table__borders">value</th>
                        <th class="table__borders">date</th>
                    </tr>
                    @foreach($arCurrency as $value)
                        @include('layouts.columns', ['currency' => $value])
                    @endforeach
                </table>
                <form method="get" action="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}" class="form__table flex">
                    <label for="valuteID">ID</label>
                    <input type="text" name="valuteID" id="valuteID" class="reg__input input-reset input__id" required>
                    <label for="dateFrom">От</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="input__date btn-reset" required>
                    <label for="dateTo">До</label>
                    <input type="date" name="dateTo" id="dateTo" class="input__date btn-reset" required>
                    <button class="btn btn-reset reg__btn_accent btn__check">
                        Смотреть
                    </button>
                </form>
            </div>

            <br>
            @if(!empty($_GET['valuteID']) || !empty($_GET['date']))
                <a class="nav__link" href="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">Очистить</a>
            @endif
            <br><br>
        </div>
@endsection
