@extends('layouts.app', ['title' => __('Главная страница')])

@section('content')
        <div class="container header__container flex">
            <nav class="nav">
                <ul class="nav__list list-reset flex">
                    <li class="nav__item">
                        <form method="get" action="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">
                            <label for="valuteID">ID</label>
                            <input type="text" name="valuteID" id="valuteID" required>
                            <label for="dateFrom">От</label>
                            <input type="date" name="dateFrom" id="dateFrom" class="date__input" required>
                            <label for="dateTo">До</label>
                            <input type="date" name="dateTo" id="dateTo" class="date__input" required>
                            <button>
                                Смотреть
                            </button>
                        </form>
                    </li>
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
                    <input type="date" name="date" id="date" value="{{ $date }}">
                    <button>
                        Смотреть
                    </button>
                    <br><br>
                </form>
            </div>
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
            <br>
            @if(!empty($_GET['valuteID']) || !empty($_GET['date']))
                <a class="nav__link" href="{{ route(\App\Http\Controllers\PublicController::ROUTE_INDEX) }}">Очистить</a>
            @endif
            <br><br>
        </div>
@endsection
