<?php

namespace App\Http\Requests;

use App\Staff;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->request->has('role');
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
            'phone' => [
                'required', 'numeric',
                Rule::unique('staff')->ignore(Staff::find($this->route('staff')))
            ],
            'role' => 'required|in:admin,project_manager,team_member',
            'email' => [
                'email',
                Rule::unique('users')->ignore(Staff::find($this->route('staff'))->user->id)
            ],
            'password' => 'nullable|min:6|confirmed'
        ];
    }
}
