<?php

namespace App\Http\Requests\Backend\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Backend\Admin\Staffs;
use App\User;

class StaffRequest extends FormRequest
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
        $staff = Staffs::findorfail($this->id);
        $user = User::findorfail($staff->user_id);
        $ids = $user->id;
        if (isset($ids)) {
            return [
                'email' => 'unique:users,email,'.$ids,
                'mobile' => 'unique:users,mobile,'.$ids
             ];
        }
        return [
            'email' => 'unique:users',
            'mobile' => 'unique:users'
         ];
    }
}
