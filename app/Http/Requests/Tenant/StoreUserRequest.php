<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    // protected $errorBag="storeUser";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // check is user can create and if Tenant has not reached it's quota
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
            'first_name' =>['required',],
            'last_name' =>['required',],
            'email' =>['required','unique:users'],
            'password' =>['required','min:8','confirmed'],
            'phone' =>['',],
        ];
    }
}
