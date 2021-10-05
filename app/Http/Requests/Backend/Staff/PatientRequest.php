<?php

namespace App\Http\Requests\Backend\Staff;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        if (isset($this->id)) {
            return [
                'email' => 'unique:patients,email,'.$this->id,
                'mobile' => 'unique:patients,mobile,'.$this->id
             ];
        }
        return [
            'email' => 'unique:patients',
            'mobile' => 'unique:patients'
         ];
    }
}
