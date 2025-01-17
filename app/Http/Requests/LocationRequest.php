<?php

namespace App\Http\Requests;

use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'location_name' => ['required',new UniqueExceptCurrent('locations', 'location_name', $this->route('location'))],
            'location_description' => 'present',
            'status' => 'required|in:0,1',
        ];
    }
}
