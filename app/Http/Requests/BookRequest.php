<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'=> 'required|max:256|string',
            'ISBN'=> 'required|size:10|string',
            'pages'=> 'required|numeric',
            'price'=> 'required|numeric',
            'published_at'=> 'required|date',
            'authors'=> 'required',
            'categories'=> 'required',
        ];
    }

    public function messages() {
        $msg=[
            'name.required'=> 'وارد کردن نام ضروری است',
            'name.string'=> 'فرمت نام رشته ای است',
            'name.max'=> 'حداکثر طول نام 256 کاراکتر است',
            'pages.required'=> 'وارد کردن تعداد صفحات ضروری است',
            'pages.numeric'=> 'فرمت تعداد صفحات، باید عددی باشد',
            'price.required'=> 'وارد کردن قیمت ضروری است',
            'price.numeric'=> 'فرمت قیمت، باید عددی باشد',
            'ISBN.required'=> 'وارد کردن ISBN ضروری است',
            'ISBN.string'=> 'فرمت ISBN رشته ای است',
            'ISBN.size'=> ' طول ISBN 10 کاراکتر است',
            'published_at.required'=> 'وارد کردن زمان انتشار ضروری است',
            'published_at.date'=> ' فرمت زمان انتشار، باید تاریخ باشد',
            'authors.required'=> 'وارد کردن نویسنده ضروری است',
            'categories.required'=> 'وارد کردن دسته بندی ضروری است',
        ];
        return $msg;
    }
}
