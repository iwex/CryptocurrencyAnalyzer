<?php

namespace App\Http\Resources;

use App\Services\Rate\Rate;
use Illuminate\Http\Resources\Json\Resource;

class RateResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Rate $rate */
        $rate = $this->resource;

        return [
            'base'   => $rate->getBase(),
            'target' => $rate->getTarget(),
            'price'  => $rate->getPrice(),
            'change' => $rate->getChange(),
            'volume' => $rate->getVolume(),
        ];
    }
}
