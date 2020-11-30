<?php

namespace App\Http\Requests;

use App\Enums\HiringTypes;
use App\Rules\NumberBR;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'salary' => ['required', 'string', 'max:11', new NumberBR],
            'responsibilities' => ['required', 'string', 'min: 20', 'max: 500'],
            'benefits' => ['nullable', 'string', 'max:500'],
            'observations' => ['nullable', 'string', 'max:500'],
            'hiringType' => ['required', Rule::in(HiringTypes::getValues())],
            'jobRole' => ['required']
        ];
    }
}
