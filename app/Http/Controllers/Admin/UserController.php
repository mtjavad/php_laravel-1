<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Model\File;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {
        $title='اصلی';
        return view('home', compact('title'));
    }
    public function shop()
    {
        $title='فروشگاه';
        return view('shop', compact('title'))->with('alert','این فلش مسیج می باشد');
    }

    public function store(Request $request)
    {
        $path=str_random(44).'.'.request()->file('file')->getClientOriginalExtension();
        $new_file=[
            'file_name' => request()->file('file')->getClientOriginalName(),
            'file_path' => public_path('image') . '\\' . $path,
            'file_type' => request()->file('file')->getClientMimeType(),
        ];
        if(request()->file('file')->move(public_path('image'),$path)) {

            //dd($new_file);
            return File::create($new_file);
        }
    }

    public function files()
    {
//        $file_all=File::all();
        $file_all=DB::table('files')->get();
        return view('files',compact('file_all'));
    }

    public function download($file_id)
    {
       // dd(DB::table('file_downloads')->select(DB::raw('sum(download_count),DATE(created_at)'))->groupBy(DB::raw('DATE(created_at)'))->get());
      //$file=File::find($file_id);
      //$file->downloadCount();
      //dd('true');
      //dd(Carbon::now()->lt(Carbon::tomorrow()));
      //return response()->download($file->file_path);
    }
    public function user()
    {
        $title='کاربران';
        return view('user', compact('title'));
    }
    public function post(UserRequest $request)
    {
        if (User::create(request()->all())) {
            return redirect()->route('admin.list')->with('msg', 'کاربر با موفقیت ثبت گردید');
        }
    }

    public function list()
    {
        $users=User::all();
        return view('list',compact('users'));
    }

    public function edit($user_id)
    {
        $user=User::find($user_id);
        return view('user', compact('user'));
    }

    public function update($user_id)
    {
        $user=User::find($user_id);
        $requests=request()->all();
        if(empty(request()->input('password'))){
            unset($requests['password']);
            //dd(request()->route('user_id'));
        };
        $user->update($requests);
        return redirect()->route('admin.list')->with('msg', 'کاربر با موفقیت آپدیت گردید');
    }

    public function delete($user_id)
    {
        $user=User::find($user_id);
        $user->delete();
        return redirect()->route('admin.list')->with('msg', 'کاربر با موفقیت حذف گردید');
    }

    public function addUser($file_id)
    {
        $user_all=User::all();
        $file=File::find($file_id);
        $selected_user=$file->users()->pluck('id')->toArray();
        $my=$file->users()->get();
//        foreach ($my as $item){
//            dd($item->pivot->name);
//        }
        return view('addUser',compact('user_all','selected_user','my'));
    }

    public function addUserUpdate($file_id)
    {
        //dd(request()->all());
        $selectedUser=request()->input('users');
        $file=File::find($file_id);
        foreach ($selectedUser as $item){
            $file->users()->attach([$item=>['name'=>'ahmad','price'=>234]]);
        }
        //$file->users()->sync($selectedUser);
        //dd($file->users()->get());
        dd($file->users()->get());
    }
}
