<?php

namespace App\Service;

interface CurrencyConversionInterface
{
    public function get_coversion_rates(string $currency_code_one, string $currency_code_two, int $amount);
    public function covert_currencies();
}
