<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidator extends FormRequest
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
		$editRequest = [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email'
        ];

        $createRequest = [
			'password' => 'required|min:8',
			'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users'
        ];
        return $this->id != null ? $editRequest : $createRequest;
    }
}