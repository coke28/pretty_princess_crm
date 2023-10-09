<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'campaign_name' => 'required|string',
            'company_name' => 'required|string',
            'address' => 'required|string',
            'email_address' => 'required|email',
            'contact_information' => 'required|string',
            'website' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'email_sent' => 'required|in:0,1',
            'category_id' => 'required|integer',
            'location_id' => 'required|integer',
            'group_id' => 'present|integer',
            //
        ];
    }
}
