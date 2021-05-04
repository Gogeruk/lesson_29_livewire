<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Rules\CurrencyCodeCheck;
use App\Service\CurrencyConversionInterface;

class CurrencyConvert extends Component
{
    public $first_currency_code;
    public $second_currency_code;
    public $amount;
    public $result;

    public function rules()
    {
        return [
            'first_currency_code'  => ['required', 'min:3', 'max:3', new CurrencyCodeCheck],
            'second_currency_code' => ['required', 'min:3', 'max:3', new CurrencyCodeCheck],
            'amount'               => 'required|regex:/^\d+(\.\d{1,2})?$/|max:255',
        ];
    }

    public function convert(CurrencyConversionInterface $convert)
    {

        $this->validate();

        $convert->get_coversion_rates(
             $this->first_currency_code,
             $this->second_currency_code,
             $this->amount
        );

        $this->result = 'The current coversion rate of '.
            $this->amount.' '.
            strtoupper($this->first_currency_code).' to '.
            strtoupper($this->second_currency_code).' is roughly: '.
            $convert->covert_currencies().' '.
            strtoupper($this->second_currency_code);
    }

    public function render()
    {
        return view('livewire.currency-convert');
    }
}
