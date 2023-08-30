@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo-App</div>

                <div class="card-body">
                 

                    <h2>Edit  Form</h2>
                    <form method="POST" action="{{ route('todo.update') }}">
                        @csrf
                        @method('Put')
                        <input type="hidden" name="todo_id" value=" {{$todo->id}}">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{$todo->title}}" >
                       
                        </div>
                        <div class="mb-3">
                          <label  class="form-label">Description</label>
                    <textarea name="description" cols="5" class="form-control" rows="5">
                        {{$todo->description}}
                    </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">status</label>
                            <select name="is_completed" class="form-control" id="">
                                <option  disabled selected> select option</option>
                                <option value="1">completed</option>
                                <option value="0"> in completed</option>

                            </select>

                        </div>
                       
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection