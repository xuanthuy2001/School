@extends('layout.master')
@section('content')
@if ($errors->any())
<div class="card-header">
      <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
</div>
@endif
<div class="card-body">

      <a class="btn btn-success " href="{{route('courses.create')}}">Thêm</a>
      <form class="float-right form-inline form-group ">
            <label for="search"> Search:</label>

            <input id="search" class="form-control" type="search" name="q" value="{{$search}}">
      </form>
      <table class="table table-dark mb-0">

            <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Create At</th>
                  <th>edit</th>
                  <th>delete</th>
            </tr>
            @foreach ($data as $each)
            <tr>
                  <td>{{$each->id}}</td>
                  <td>{{$each->name}}</td>
                  <td>{{$each->year_created_at}}</td>
                  <td>
                        <a href="{{route('courses.edit',$each)}}">
                              <button class="btn btn-success">Edit</button>
                        </a>
                  </td>
                  <td>
                        <form action="{{route('courses.destroy',$each)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn  btn-danger">delete</button>
                        </form>
                  </td>

            </tr>
            @endforeach
      </table>
      {{ $data->links() }}

</div>



@endsection