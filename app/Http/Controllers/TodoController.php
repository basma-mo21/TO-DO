<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class TodoController extends Controller
{
    public function index()
    {
      $todos= Todo::all();
       return view('todo.index', [
         'todos'=>$todos
       ]) ;
    }

    public function create()
    {
       return view('todo.create');
    }

    public function store(TodoRequest $request)

    {
      //$request->validate();
      //Todo::created($request->all());
      Todo::create([
        'title'=>$request->title ,
        'description'=>$request->description ,
        'is_completed'=>0
      
       ]);
       

       session::flash('alert-success', 'Todo created successfully');

       return to_route('todo.index');
    }

    public function show($id)
    {
      $todo= Todo::find($id);
      if(! $todo){
        return to_route('todo.index')->withErrors([
          'error'=>'unable to locate the todo'
        ]);
      }
      return view('todo\show', ['todo'=>$todo]);
   
    }

    public function edit($id)
    {
      $todo= Todo::find($id);
      if(! $todo){
        return to_route('todo.index')->withErrors([
          'error'=>'unable to locate the todo'
        ]);
      }
      return view('todo\edit', ['todo'=>$todo]);
   
    }
    public function update(TodoRequest $request){
      $todo= Todo::find($request->todo_id);
      if(! $todo){
        return to_route('todo.index')->withErrors([
          'error'=>'unable to locate the todo'
        ]);   
    }

    
    $todo->update([
      'title'=>$request->title ,
    'description'=>$request->description ,
    'is_completed'=>$request->is_completed
    ]);
    Session::flash('alert-info', 'Todo updated successfully');
        
    return to_route('todo.index');


}


public function destroy(Request $request){
  $todo= Todo::find($request->todo_id);
  if(! $todo){
    return to_route('todo.index')->withErrors([
      'error'=>'unable to locate the todo'
    ]);   
}


$todo->delete();
Session::flash('alert-danger', 'Todo deleted successfully');
        
return to_route('todo.index');









}
}