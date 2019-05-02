<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionsController extends Controller
{
    public function __construct()
    {
	    $this->middleware('guest',[
		    'only'=>['create']
	    ]);
    }
    //
    public function create()
    {
	    return view('sessions.create');
    }

    public function store(Request $request)
    {
	    $credentials = $this->validate($request,[
		    'email'=>'required|email|max:255',
		    'password'=>'required'
	    ]);

	    if(Auth::attempt($credentials,$request->has('remember'))){
		    session()->flash('success','欢迎回来!');
		    $fallback=route('users.show',Auth::user());
		    return redirect()->intended($fallback);
		    //登录成功后的相关操作
	    }else{
		    session()->flash('danger','密码或邮箱错误');
		    return redirect()->back()->withInput();
		    //登录c失败后的相关操作
	    }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
