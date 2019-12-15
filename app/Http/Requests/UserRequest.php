<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $rule=[
            'name'=> 'required',
            'phone_number'=> 'required|numeric|unique:users,phone_number',
//            'email'=> 'required|email',
            'password'=> 'required',
            'password_confirmation'=> 'same:password',
            'national_code'=> 'required|size:10'
        ];
        return $rule;
    }

    public function messages() {
        $msg=[
            'name.required'=> 'وارد کردن نام ضروری است',
//            'email.required'=> 'وارد کردن ایمیل ضروری است',
//            'email.email'=> 'فرمت ایمیل صحیح نیست',
            'phone_number.required'=> 'وارد کردن شماره موبایل ضروری است',
            'phone_number.numeric'=> 'فرمت شماره موبایل، باید عددی باشد',
            'phone_number.unique'=> 'شماره موبایل، تکراری است',
            'password.required'=> 'وارد کردن کلمه عبور ضروری است',
            'password_confirmation.same'=> 'کلمه های عبور باید یکسان باشند',
            'national_code.required'=> 'وارد کردن کد ملی ضروری است',
            'national_code.size'=> 'کد ملی باید 10 کاراکتر باشد',
        ];
        return $msg;
    }
}
