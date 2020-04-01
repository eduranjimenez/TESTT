<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionCommission extends FormRequest
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
            'representation_id' => 'required',
            'commission_id' => 'required',
            'institution_id' => 'required',
            'capacity' => 'required'
        ];
    }
}
