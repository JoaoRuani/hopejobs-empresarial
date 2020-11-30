<?php

namespace App\Rules;

use App\Helpers\NumberHelper;
use Illuminate\Contracts\Validation\Rule;

class NumberBR implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $none = NumberHelper::ConvertBrazilianFormatToFloat($value);
            return true;
        }
        catch (\Throwable $ex)
        {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O :attribute possui um formato inválido.';
    }
}
