<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);

        $this->middleware('guest',[
            'only'=>['create'],
        ]);
    }

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

    //编辑view
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    //更新
    public function update(User $user,Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'password'=>'nullable|min:6|confirmed',
        ]);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $this->authorize('update',$user);
        $user->update($data);

        session()->flash('success','恭喜你，修改成功！');
        return redirect()->route('users.show',[$user]);
    }

    //用户列表view
    public function index()
    {
        //$users = User::all();
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    //删除用户
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
