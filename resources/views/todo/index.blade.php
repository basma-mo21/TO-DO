@extends('layouts.app')



@section('styles')
<style>
#outer
{
    width:auto;
    text-align: center;
}
.inner
{
    display: inline-block;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 @if (Session::has('alert-success'))
                 <div class="alert alert-success" role="alert">
                    {{Session::get('alert-success')}}
                  </div>
                 @endif


                 @if (Session::has('alert-info'))
                 <div class="alert alert-info" role="alert">
                    {{Session::get('alert-info')}}</div>
                 @endif



                 @if (Session::has('alert-danger'))
                 <div class="alert alert-danger" role="alert">
                    {{Session::get('alert-danger')}}</div>
                 @endif
                   
                   



                 <a  style="margin-bottom: 20px" class="btn btn-lg btn-info" href="{{route('todo.create')}}">Create TO-DO</a>
                 @if ( count($todos)>0)
                     
                 
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($todos as $todo)
                     <tr>
                      <td>{{$todo->title}}</td>
                      <td>{{$todo->description}}</td>
                      <td>
                        @if ($todo->is_completed ==1)
                        <a href="" class=" btn btn-sm btn-success">Completed</a>
                            @else
                            <a href="" class=" btn btn-sm btn-danger"> in Completed</a>
                        @endif
                        
                      </td>
                      <td id="outer">
                        <a href="{{ route('todo.edit',$todo->id) }}" class=" inner btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('todo.show',$todo->id) }}"class=" inner btn btn-sm btn-warning">View</a>
                        <form method="post" action="{{route('todo.destroy')}}" class="inner">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="todo_id" value=" {{$todo->id}}">
                          <input type="submit" class="btn  btn-sm btn-danger" value="Delete">
                        </form>
                      </td>
                     </tr>
                       
                     @endforeach
                    </tbody>
                  </table>
                  @else
                  <h2>no data</h2>
                  @endif

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
