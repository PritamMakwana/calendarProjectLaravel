<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalFromRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'name'=>[
                    'required',
                    'string'
                ],
                'email'=>[
                    'required',
                    'string',
                    'email'
                ],
                'mobile'=>[
                    'required',
                    'regex:/^([0-9\s\-\+\(\)]*)$/',
                    'min:10'
                ],
                'password'=>[
                    'required',
                    'string'
                ],
                'address'=>[
                    'required',
                    'string'
                ],
                'skill'=>[
                    'required',
                ],
                'image'=>[
                    'required',
                    'mimes:png,jpg,jpeg',
                ],
        ];
    }
}
