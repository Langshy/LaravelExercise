<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 展示所有文章
     */
    public function index()
    {
        //
//        return view('admin.index')->with('admins',Admin::all());
    }

    /**
     * Show 'Hello World!'
     *
     */
    public function Home(){
        return 'Hello World!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 发表表单页面
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 获取表单提交数据并保存
     */
    public function store(Request $request)
    {
        //Admin模型类
        $admin = new Admin();
        $admin->title = $request->input('title');
        $admin->content = $request->input('content');
        $admin->save();
        //重定向 GET Admin 路由
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 展示单个文章
     */
    public function show($id)
    {
        //
        return 'Admin ' .$id.' Link:'.route('admin.show',[$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 编辑文章表单页面
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 获取编辑表单输入并更新文章
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 删除单个文章
     */
    public function destroy($id)
    {
        //
    }
}
