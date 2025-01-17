<?php

namespace App\Http\Requests;

use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password' => 'present',
            'email' => ['required',new UniqueExceptCurrent('users', 'email', $this->route('user'))], // Add the 'unique' rule here
            'status' => 'required|in:0,1',
        ];
    }
}
