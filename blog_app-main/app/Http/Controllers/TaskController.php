<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //モデルのレコードを全部取得す
      $tasks = Task::where('status', false)->get();
      return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     */
    public function store(Request $request)
    {
          $rules = [
          'task_name' => 'required|max:100',
          ];
         $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
         Validator::make($request->all(),$rules,$messages)->validate();
        //モデルをインスタンス化する。new クラス名でインスタンス化
        $task = new Task;
        //モデル->カラム名 = 値をすることで、tasksテーブルのnameカラムに値を割り当てる
        $task->name = $request->input('task_name');
        //データベースに保存する
        $task->save();
        //リダイレクト
        return redirect('/tasks');
  //     // //フォームから送信されたデータのうち、特定のキーの値を取り出すことができる
  //     //   $task_name = $request->input('task_name');
  //     //   //dd以降の処理は実行されない var_dump() exit()と同じ
  //     //   dd($task_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //変数$idとして戻ってくるようになります
      $task = Task::find($id);
      return view('tasks.edit', compact('task'));
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
      //確認
      if($request->status === null) {
      $rules = [
        'task_name' => 'required|max:100',
      ];
    
      $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
    
      Validator::make($request->all(), $rules, $messages)->validate();
    
    
      //該当のタスクを検索
      $task = Task::find($id);
    
      //モデル->カラム名 = 値 で、データを割り当てる
      $task->name = $request->input('task_name');
    
      //データベースに保存
      $task->save();
      } else {
        //該当のタスクを検索
      $task = Task::find($id);
      $task->status = true;
      //データベースに保存
      $task->save();
      }
      //リダイレクト
      return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Task::find($id)->delete();
      return redirect('/tasks');
    }
}
