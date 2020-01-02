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
                    <a href="{{route('viewTodos')}}">ToDo Lists</a>
                    <a href="{{route('home')}}">Home</a>
                    <br>
                    <h1>Update Your To-Do: </h1>
                    <form method="post" action="{{route('updateTodo',[$todo->id])}}">
                        @method('PUT')
                        @csrf
                        <label>Title</label>
                        <input type="text" name="title" value="{{$todo->title}}">
                        <label>Description</label>
                        <input type="text" name="description" value="{{$todo->description}}">
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection