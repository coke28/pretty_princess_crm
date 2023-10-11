<?php

namespace App\Http\Requests;

use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
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
            'email_template_name' => ['required',new UniqueExceptCurrent('email_templates', 'email_template_name', $this->route('email_template'))],
            'email_template_description' => 'present',
            'head' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|in:0,1',
            //
        ];
    }
}
