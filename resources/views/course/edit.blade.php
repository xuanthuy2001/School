@extends('layout.master')
@section('content')
<form action="{{route('courses.update',$each)}}" method="post">
      @csrf
      @method('PUT')
      name
      <input type="text" name="name" value="{{$each->name}}"> <br>

      <button class="btn btn-primary">update</button>
</form>
@endsection