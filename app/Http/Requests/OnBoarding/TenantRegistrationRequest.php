<?php

namespace App\Http\Requests\OnBoarding;

use Illuminate\Foundation\Http\FormRequest;

class TenantRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //make up some rules later
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'school_name'=>['required'],
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'phone'=>['required'],
            'password'=>['required','min:8','confirmed'],
            'domain'=>['required','unique:domains'],

        ];
    }
}
