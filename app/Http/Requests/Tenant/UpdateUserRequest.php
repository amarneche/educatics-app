<?php

namespace App\Http\Requests\Tenant;

use App\Models\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule ;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'email' =>['required','unique:users,id,'.$this->user->id],
            'password' =>['confirmed'],
            'phone' =>['',],
            'role'=>[Rule::in(Role::all()->pluck('name'))]
        ];
    }
}
