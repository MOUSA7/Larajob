<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'address'     =>'required|max:30',
            'bio'         =>'required |min:20',
            'phone_number'=>'required|numeric',
            'experience'  => 'required|min:20'
            //
        ];
    }
}
