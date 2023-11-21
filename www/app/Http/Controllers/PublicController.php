<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /** @var string  */
    const ROUTE_INDEX       = 'public.index';

    /** @var string  */
    const ROUTE_AUTH        = 'public.auth';

    /** @var string  */
    const ROUTE_REGISTER    = 'public.register';

    /**
     * Главная страница
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index (Request $request)
    {
        $obCurrency = new Currency();

        $date = (!empty($request->get('date'))) ? ($request->get('date')) : (new Currency())->get()->max('date');

        $arCurrency = $obCurrency->getCurrencyByDate($date);

        if (!empty($request->get('valuteID'))) {
            $arCurrency = $obCurrency->getCurrencyById($request);
        }

        return view('index',
        [
            'arCurrency' => $arCurrency,
            'date' => $date,
        ]);
    }

    /**
     * Страница авторизации
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function auth ()
    {
        return view('auth');
    }

    /**
     * Страница регистрации
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function register ()
    {
        return view('register');
    }
}
