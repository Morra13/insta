<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'valuteID'  => $this->valuteID,
            'numCode'   => $this->numCode,
            'сharCode'  => $this->сharCode,
            'name'      => $this->name,
            'value'     => $this->value,
            'date'      => $this->date,
        ];
    }
}
