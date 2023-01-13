<?php

namespace App\Http\Requests\Admin;

use App\Models\Package;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create',Tenant::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'package_id'=>['required', Rule::in(Package::all()->pluck('id'))],
            'school_name' =>['required'],
            'domain' =>['required','unique:domains','alpha_num' ],
        ];
    }
}
