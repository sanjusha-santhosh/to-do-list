<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function home(){
        $todos = Todo::all();
        return view('home',['todos'=>$todos]);
    }
    public function store(Request $request ){
        $validatedData = $request->validate([
           "title"=>'required|max:125'
        ]);
        Todo::create($validatedData);
        return back();
    }
    public function edit(Todo $todo) {
        return view('update',compact('todo'));

    }
    public function update(Request $request,Todo $todo){
        $validatedData = $request->validate([
            "title"=>'required|max:125'
        ]);
        $todo->update($validatedData);
        return redirect(route('home'));
    }
    public function delete(Todo $todo){
        $todo->delete();
        return back();
    }

}

