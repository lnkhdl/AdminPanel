<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'role_id' => 'required|exists:App\Models\Role,id',
        ];

        if ($this->getMethod() == 'PUT') {
            $rules += ['email' => 'required|email|unique:users,email,' . $this->user->id,];
        }
        else {
            $rules += ['email' => 'required|email|unique:users,email'];
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'role_id' => 'role',
        ];
    }
}
