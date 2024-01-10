<?php

namespace App\Http\Services;

use CurrencyApi\CurrencyApi\CurrencyApiClient;
use CurrencyApi\CurrencyApi\CurrencyApiException;

/**
 * Service for working with the CurrencyApi.
 */
class CurrencyService
{
    /**
     * Convert the given amount from one currency to another.
     *
     * @param string $currency1
     * @param string $currency2
     * @return array The conversion result containing rates.
     * @throws CurrencyApiException If there is an issue with the CurrencyApi.
     */
    public function convert(string $currency1, string $currency2): array
    {
        $client = $this->getClient();

        return $client->latest([
            'base_currency' => $currency1,
            'currencies' => $currency2,
        ]);
    }

    /**
     * Get an instance of the CurrencyApi client.
     *
     * @return CurrencyApiClient The CurrencyApi client instance.
     */
    public function getClient(): CurrencyApiClient
    {
        return new CurrencyApiClient(env('CURRENCY_API_TOKEN'));
    }
}
