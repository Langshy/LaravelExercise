<?php

namespace App\Http\Controllers\User;

//use App\Models\User;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }

    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['show','create','store','index']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:25',
            'password'=>'required|confirmed|min:6'
        ]);

        //添加数据
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);


        //注册成功，用户登录
        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show',[$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //j0yhu903
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validate($request,[
            'name'=>'required|max:50',
            'password'=>'nullable|min:6|confirmed'
        ]);

        $this->authorize('update', $user);

        //更新
        $data = [];
        $data['name']=$request->name;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);

        return redirect()->route('user.show',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success','成功删除用户!');
        return redirect()->back();
    }
}
