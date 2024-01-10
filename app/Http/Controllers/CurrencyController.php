<?php

namespace App\Http\Controllers;

use App\Http\Services\CurrencyService;
use CurrencyApi\CurrencyApi\CurrencyApiException;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService The instance of the CurrencyService.
     */
    protected CurrencyService $currencyService;

    /**
     * CurrencyController constructor.
     *
     * @param CurrencyService $currencyService The CurrencyService instance injected into the controller.
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Retrieve and display currency conversion rates.
     *
     * @return array|JsonResponse The formatted currency conversion rates.
     * @throws CurrencyApiException If there is an issue with the CurrencyApi.
     *
     */
    public function index()
    {
        // Convert USD to RUB
        $data1 = $this->currencyService->convert('USD', 'RUB');

        // Handle errors from the first conversion
        if (isset($data1['errors'])) {
            return response()->json($data1, 500);
        } elseif (!isset($data1['data']['RUB']['value'])) {
            return response()->json(['errors' => 'Something went wrong'], 500);
        }

        // Convert BTC to USDT
        $data2 = $this->currencyService->convert('BTC', 'USDT');

        // Handle errors from the second conversion
        if (isset($data2['errors'])) {
            return response()->json($data2, 500);
        } elseif (!isset($data2['data']['USDT']['value'])) {
            return response()->json(['errors' => 'Something went wrong'], 500);
        }

        // Format and return the result
        return [
            'rub_to_usd' => number_format($data1['data']['RUB']['value'], 2),
            'usdt_to_btc' => number_format($data2['data']['USDT']['value'], 2),
        ];
    }
}
