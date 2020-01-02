<?php

namespace App\Http\Controllers;

use App\TodoModel;
use Illuminate\Http\Request;
use Auth;

class Crud extends Controller
{
    // public function search(Request $request){

    //     $data['search'] = TodoModel::where('user_id',Auth::user()->id)
    //                                 ->where('title',$request->title)
    //                                 ->get();

    //     return view('home',$data);
    // }
    public function viewTodos(){
        $data['viewTodos'] = Auth::user()->Todos;
        return view('viewTodos',$data);
    }

    public function createTodo(){
        return view('createTodo');
    }

    public function addTodos(Request $request){
        $todo = new TodoModel;
        $todo->user_id = Auth::user()->id;
        $todo->title =  $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect(route('viewTodos'));
    }

    public function deleteTodo($id){
        $todo = TodoModel::find($id);
        $todo->delete();

        return redirect(route('viewTodos'));
    }

    public function editTodo($id){
        $todo = TodoModel::find($id);
        
        return view('editTodo',compact($todo,'todo'));
    }

    public function updateTodo(Request $request,$id){
        $todo = TodoModel::find($id);
        $updatedTodo = $request->all();
        $todo->title = $updatedTodo['title'];
        $todo->description = $updatedTodo['description'];
        $todo->save();

        return redirect(route('viewTodos'));
    }
}

//  <br>
// <div class="content">
// <div class="title m-b-md">
//     Search any Todo??
// </div>
// <div class="form-group row">
// <form method="get" action ="{{route('search')}}">
// <label class="col-8 col-form-label text-left">{{ __('Search Title')}}</label>

// <div class="col-md-12">
// <label for="title"></label>
// <input type="text" name="title">

// </div>
// <div class="col-md-6">
//     <button type="submit" class="btn btn-primary">
//         {{ __('Submit')}}
//     </button>
// </div>

// </form>
// </div>
// </div>

// <div>
// @foreach($search as $result)
// <li>
//     Title: {{$result->title}}
//     <br>
//     Description: {{$result->description}}
//     <br>
//     Created at: {{$result->created_at}}

// </li>
// @endforeach
// </div> 
