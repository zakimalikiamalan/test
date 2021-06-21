<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|unique:employers|email',
            'phone_number' => 'required|unique:employers',
            'position_id' => 'required',
            'departement_id' => 'required',
            'office_id' => 'required',
        ];
    }
}
