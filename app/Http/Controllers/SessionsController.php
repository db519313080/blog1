<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['create'],
        ]);
    }

    /**
     * 登录view
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 登录port
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->has('remember')))
        {
            session()->flash('success','欢迎回来！');
            return redirect()->intended(route('users.show',Auth::user()));
            //return redirect()->route('users.show',[Auth::user()]);
            // OR return redirect()->route('users.show',[Auth::user()->id]);
        } else {
            session()->flash('danger','邮箱或密码有误！');
            return redirect()->route('login');
        }
    }

    /**
     * 退出port
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出！');

        return redirect()->route('login');
    }
}
