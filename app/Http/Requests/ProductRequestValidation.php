<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProductRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pname'       => 'required',
            'category_id' => 'required',
            'ptype'       => 'required',
            'quantity'    => 'required',
            'psize'       => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return void
     */
    public function messages()
    {
        return [
            'pname.required'        => trans('validation.product_name'),
            'category_id.required'  => trans('validation.category_id'),
            'ptype.required'        => trans('validation.product_type'),
            'quantity.required'     => trans('validation.quantity'),
            'psize.required'        => trans('validation.size'),
        ];
    }

     /**
     * failedValidation
     *
     * @param  mixed $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        validatorErrorMessage($validator);
    }

}
