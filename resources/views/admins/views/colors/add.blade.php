@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="" method="post">

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="color_name" placeholder="Name of color..." value="{{old('color_name')}}">
            @error('color_name')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        <a href="{{route('admin.color.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection