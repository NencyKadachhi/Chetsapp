<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }
    public function messages()
    {
        // use trans instead on Lang 
        return [
            'username.required' => Lang::get('userpasschange.username Is Required'),
            'email.required' => Lang::get('email.email Is Required'),
            'password.required' => Lang::get('password.password Is Required'),
            'address.required' => Lang::get('address.address Is Required'),
            'city.required' => Lang::get('city.city Is Required'),
            'country.required' => Lang::get('country.country Is Required'),
            'image.required' => Lang::get('image.Image Is Required'),
        ];
    }
}
