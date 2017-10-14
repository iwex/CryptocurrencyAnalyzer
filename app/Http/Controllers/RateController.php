<?php

namespace App\Http\Controllers;

use App\Http\Resources\RateResource;
use App\Services\Rate\RateServiceInterface;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index(Request $request, RateServiceInterface $rateService)
    {
        $rate = $rateService->getRate();

        return new RateResource($rate);
    }
}