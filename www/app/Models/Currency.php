<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Currency
 * @package App\Models
 *
 * @property int id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property string valuteID
 * @property integer numCode
 * @property string сharCode
 * @property string name
 * @property float value
 * @property Carbon date
 */
class Currency extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    const TABLE  = 'currency';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    /**
     *  Получение курсов по дате
     * @param $date
     * @return mixed
     */
    public function getCurrencyByDate ($date)
    {
        return (new Currency())
            ->where('date', $date)
            ->get()
            ->all()
        ;
    }

    /**
     * Получение курсов по id и по датам
     * @param Request $request
     * @return mixed
     */
    public function getCurrencyById (Request $request) {
        return (new Currency())
            ->where('valuteID', $request->get('valuteID'))
            ->whereBetween('date', [$request->get('dateFrom'), $request->get('dateTo')])
            ->get()
            ->all()
        ;
    }
}
