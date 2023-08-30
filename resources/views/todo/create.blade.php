@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo-App</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                         @endif
                    <h2>CREATE FORM</h2>

                    <form method="POST" action="{{ route('todo.store') }}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" >
                       
                        </div>
                        <div class="mb-3">
                          <label  class="form-label">Description</label>
                    <textarea name="description" cols="5" class="form-control" rows="5">

                    </textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection