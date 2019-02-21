<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (Gate::forUser(User::findOrFail($value))->denies('project-manager'))
                        $fail("{$attribute} field is supposed to be a project manager");
                }
            ]
        ];
    }
}
