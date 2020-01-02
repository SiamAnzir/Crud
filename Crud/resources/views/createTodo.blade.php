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
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('viewTodos')}}">ToDo Lists</a>
                    <br>
                    <br>
                    <h1>Create Your ToDo:</h1>
                    <form method="post" >
                    @csrf
                    <label>Title</label>
                    <input type="text" name="title" value="">
                    <br>
                    <label>Description</label>
                    <textarea type="textarea" name="description" value=""></textarea>
                    <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection