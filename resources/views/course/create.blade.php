@extends('layout.master')
@section('content')

<form action="{{route('courses.store')}}" method="post">
      @csrf
      name
      <input type="text" name="name" placeholder="Vui lòng nhập tên " value="{{old('name  ')}}"> <br>

      @if ($errors->has('name'))
      <span class="error">
            {{ $errors -> first('name') }}
      </span>
      @endif

      <button class="btn btn-primary">Thêm</button>

</form>
@endsection