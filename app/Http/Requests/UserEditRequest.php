<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        return [
            //
            'first_name' => 'required|regex:/^[a-zA-Z0-9]*$/',
            'last_name' => 'required|regex:/^[a-zA-Z0-9]*$/',
            'user_level_id' => 'required|integer',
            'password' => 'nullable|string|min:4', // Make it nullable since it's not required for updates
            'email' => 'required|email', // Add the 'unique' rule here
            'status' => 'required|integer',
        ];
    }
}
