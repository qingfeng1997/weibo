<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPassword extends Controller
{
	
	//密码更新页面
	public function showResetForm()
	{
		return view('auth.passwords.email');
	}
	//执行密码更新操作
	public function reset()
	{
		return view('auth.passwords.reset');
	}
}
