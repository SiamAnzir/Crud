@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                    <br>
                    <a href="{{route('createTodo')}}">Add ToDo</a>
                    <a href="{{route('home')}}">Home</a>
                    <br>
                    <br>
                    <h1>ToDo Lists: </h1>

                    <button id="btn1">Show</button>
                    <ul id="info1">
                        <button id="btn2">Hide</button>
                        @foreach($viewTodos as $todo)
                        <li>
                            <h2>title: {{$todo->title}}</h2>
                            <h3>description: {{$todo->description}}</h3>
                            Created: {{$todo->created_at}}

                            <form method="post" action="{{route('deleteTodo',[$todo->id])}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                            </form>
                            <button><a href="{{route('editTodo',[$todo->id])}}">Edit</a></button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    $("document").ready(function(){
        $("#btn2").on('click', function(){
            $("#info1").hide();
            $("#btn1").show();           
        });
        $("#btn1").on('click',function(){
            $("#btn1").hide();
            $("#info1").show();
        });
    });
@endsection