<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogs = Blog::all();
      return view('blogs/index',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'blog_title'=> 'required|max:100',
        'blog_body' => 'required',
      ];
      $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
      Validator::make($request->all(), $rules, $messages)->validate();
      //モデルをインスタンス化
      $blog = new Blog;
      $blog->title = $request->input('blog_title');
      $blog->body = $request->input('blog_body');
      //データベースに保存
      // dd($blog);
      $blog->save();
      return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blog = Blog::find($id);
      return view('blogs/show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $blog = Blog::find($id);
      return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = [
        'blog_title' => 'required|max:100',
        'blog_body' => 'required',
      ];
      $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
      Validator::make($request->all(), $rules, $messages)->validate();
      //該当のタスクを検索
      $blog = Blog::find($id);
      //モデル->カラム名 = 値 で、データを割り当てる
      $blog->title = $request->input('blog_title');
      $blog->body = $request->input('blog_body');
      //データベースに保存
      $blog->save();
      //リダイレクト
      return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Blog::find($id)->delete();
      return redirect('/blogs');
    }
}
