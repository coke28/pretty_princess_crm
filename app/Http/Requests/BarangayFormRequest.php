<?php

namespace App\Http\Requests;

use App\Rules\CommaSeperated;
use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class BarangayFormRequest extends FormRequest
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
            'form_name' => [
                'required',
                'string',
                // Use the UniqueExceptCurrent rule conditionally
                new UniqueExceptCurrent('forms', 'form_name', $this->route('form')),
            ],
            'file_template_url' => 'required|string',
            'data_set' => ['required', new CommaSeperated],
            'status' => 'required|in:1,0',
            //
        ];
    }
}
