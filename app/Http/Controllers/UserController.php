<?php

namespace App\Http\Controllers;

use App\Events\UserNotify;
use App\Http\Requests\UserRequest;
use App\Mail\UserRegisterEmail;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;

class UserController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'password' => 'required',
        ],
            [
                'phone_number.required' => 'وارد کردن شماره موبایل ضروری است',
                'phone_number.numeric' => 'فرمت شماره موبایل، باید عددی باشد',
                'password.required' => 'وارد کردن کلمه عبور ضروری است',
            ]
        );
//        dd((Auth::attempt(['phone_number'=>$request->input('phone_number'),'password'=>$request->input('password')])));
        if (Auth::attempt(['phone_number' => $request->input('phone_number'), 'password' => $request->input('password')])) {
//            $user=Auth::user();
            return redirect()->route('book.create');
        } else {
            return redirect()->route('login')->with('msglogn', 'چنین کاربری یافت نشد');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('book.index');
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(UserRequest $request)
    {
//        $request->validate([
//            'name'=> 'required',
//            'phone_number'=> 'required|numeric|unique:users,phone_number',
//            'password'=> 'required',
//            'password_confirmation'=> 'same:password',
//            'national_code'=> 'required|size:10'
//        ],
//            [
//                'name.required'=> 'وارد کردن نام ضروری است',
//                'phone_number.required'=> 'وارد کردن شماره موبایل ضروری است',
//                'phone_number.numeric'=> 'فرمت شماره موبایل، باید عددی باشد',
//                'phone_number.unique'=> 'شماره موبایل، تکراری است',
//                'password.required'=> 'وارد کردن کلمه عبور ضروری است',
//                'password_confirmation.same'=> 'کلمه های عبور باید یکسان باشند',
//                'national_code.required'=> 'وارد کردن کد ملی ضروری است',
//                'national_code.size'=> 'کد ملی باید 10 کاراکتر باشد',
//            ]
//        );

        $data = ['name' => $request->input('name'),
//            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => bcrypt($request->input('password')),
            'national_code' => $request->input('national_code'),
        ];
//        dd($data);
        $user=User::create($data);
        $msg='از این که در این سایت ثبت نام کردی، خیلی خوشحالیم.';
        if ($user) {
            event(new UserNotify($user,$msg));
            return redirect()->route('login')->with('msgreg', 'کاربر با موفقیت ثبت گردید');
        }
    }

}
