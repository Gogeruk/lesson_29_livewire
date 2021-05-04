<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class CurrencyConversionServicFloatratese implements CurrencyConversionInterface
{
    public $data;
    public $currency_code_one;
    public $currency_code_two;
    public $amount;

    public function get_coversion_rates(string $currency_code_one, string $currency_code_two, int $amount)
    {
        $this->currency_code_one = strtolower($currency_code_one);
        $this->currency_code_two = strtolower($currency_code_two);
        $this->amount            = $amount;

        $response = Http::get('http://www.floatrates.com/daily/'.$this->currency_code_one.'.json');
        $this->data = json_decode($response, true);
    }

    public function covert_currencies()
    {
        $conversion_raate = $this->data["$this->currency_code_two"]['rate'];
        if ($this->amount > 1) {
            $conversion_raate = $this->amount * $this->data["$this->currency_code_two"]['rate'];
        }
        return $conversion_raate;
    }
}
