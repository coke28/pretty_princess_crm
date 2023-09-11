<?php

namespace App\Http\Requests;
use App\Rules\CommaSeperated;

use Illuminate\Foundation\Http\FormRequest;

class BarangayFormEditRequest extends FormRequest
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
            'form_name' => 'required|string|unique:forms,form_name',
            'file_template_url' => 'required|string',
            'data_set' => ['required', new CommaSeperated],
            'status' => 'required|in:1,0',
        ];
    }
}
