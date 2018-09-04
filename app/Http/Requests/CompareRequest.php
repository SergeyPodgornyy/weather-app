<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompareRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'cities'            => 'required|array|min:2',
            'cities.*.id'       => 'required_without:cities.*.name|integer|min:1',
            'cities.*.name'     => 'required_without:cities.*.id|string|min_length:2',
            'cities.*.country'  => 'required_without:cities.*.id|string|min_length:2',
        ];
    }

    public function messages() : array
    {
        return [];
    }
}
