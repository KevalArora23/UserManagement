<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class userdatarequest extends FormRequest
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
            'email' => ['required','string','email',Rule::unique('users')],
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'is_admin'=>  'required',
            'username' => ['required','min:3','max:12',Rule::unique('users')],
            'password' => 'required|min:3|max:12',
            'gender' =>  ['required', Rule::in([1, 2])],
            'techids' =>  'required',
            'city'=>  'required|not_in:0',
            'address'=> 'required',
            'mob_num' => 'required|digits:10',
            'avtar' => 'required|mimetypes:image/jpeg,image/png'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'firstname.required' => 'First Name is required.',
            'lastname.required' => 'Last Name is required.',
            'is_admin.required'=>  'Please Select Admin User Type.',
            'username.required' => 'UserName is required.',
            'password.required' => 'Password is required.',
            'gender.required' =>  'Please select Gender.',
            'techids.required' =>  'Please Check Technology Proficient.',
            'city.required'=>  'Please select City.',
            'address.required'=> 'Please add Address.',
            'mob_num.required' => 'Please add mobile number.',
            'avtar.required' => 'Please select Image for profile picture.'
        ];
    }
}
