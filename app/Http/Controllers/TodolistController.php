<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    public function index()
    {
        $todolists = Todolist::paginate(10);
        return view('todo-list',compact('todolists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ],[
            'content.required' => 'Please Enter Task!'
        ]);

        $todoModel = new Todolist();
        $todoModel->content = $request->content;
        $save = $todoModel->save();
        if($save){
            return back()->with('success','Task Added!',3);
        }
    }

    public function destroy($id)
    {
        $delete = Todolist::where('id',$id)->delete();
        if($delete){
            return back()->with('success','Task deleted',3);
        }
    }
}
