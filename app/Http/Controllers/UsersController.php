<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //注册
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:255',
            'password'=>'required|max:50|confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        //自动登录
        Auth::login($user);

        session()->flash('success','恭喜你，注册成功！');
        return redirect()->route('users.show',[$user]);
    }
}
