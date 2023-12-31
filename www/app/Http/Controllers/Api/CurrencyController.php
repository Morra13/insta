<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CurrencyController extends Controller
{
    /** @var string  */
    const ROUTE_PARSE_CURRENCY = 'api.parseCurrency';

    /** @var string  */
    const ROUTE_DELETE_ALL = 'api.deleteAll';

    /** @var string  */
    const REST_GET_CURRENCY = 'api.getCurrency';

    /**
     * Парс данных
     * @return \Illuminate\Http\RedirectResponse
     */
    public function parseCurrency () {
        for ($i = 0; $i < 30; $i++ ) {
            $date = new \DateTime(); // For today/now, don't pass an arg.
            $date->modify("-".$i." day");
            $dateForUrl = $date->format('d/m/Y');

            $url = "https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$dateForUrl;
            $xmlFile = file_get_contents($url);
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $arResult = json_decode($jsonFormatData, true);

            foreach ($arResult['Valute'] as $value) {
                $obCurrency = new Currency();
                $obCurrency->valuteID = $value['@attributes']['ID'];
                $obCurrency->numCode = (int) $value['NumCode'];
                $obCurrency->сharCode = $value['CharCode'];
                $obCurrency->name = $value['Name'];
                $obCurrency->value = (float) $value['Value'];
                $obCurrency->date = $date;
                $obCurrency->save();
            }
        }

        return redirect()->route(\App\Http\Controllers\PublicController::ROUTE_INDEX);

    }

    /**
     * Очистка таблицы currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll ()
    {
        $obCurrency = new Currency();
        $obCurrency::query()->delete();

        return redirect()->route(\App\Http\Controllers\PublicController::ROUTE_INDEX);
    }

    /**
     * Получение курсов REST API
     *
     * @param Request $request
     * @return mixed
     */
    public function getCurrency (Request $request) {
        return CurrencyResource::collection(Currency::getCurrencyById($request));
    }
}
