<?php

namespace App\Http\Requests\class;

use Illuminate\Foundation\Http\FormRequest;

class ClassAddRequest extends FormRequest
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
        $rules = [];
        if ($this->isMethod('post')) {
            $rules = [
                'publish_flag' => 'required',
                'description' => 'max:2000',
            ];
        }
        return $rules;
    }
}
