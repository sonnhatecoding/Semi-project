@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.brand.postEdit')}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="brand_name" placeholder="Name of brand..." value="{{old('brand_name') ?? $brandDetail->brand_name}}">
            @error('brand_name')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Logo: </label>
            <input type="file" name="brand_logo">
            @error('brand_logo')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.brand.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection