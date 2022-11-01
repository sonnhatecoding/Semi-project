@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.inventory-vouchers.postEdit')}}" method="post" >

        <div class="mb-3">
            <label for=""> Types: </label>
            <select name="iv_type" name="form-control">
                <option value="0" {{$ivDetail->iv_type=='0' ?'selected':false}}>Import</option>
                <option value="1" {{$ivDetail->iv_type=='1' ?'selected':false}}>Export</option>
            </select>
            @error('iv_type')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for=""> Status: </label>
            <select name="iv_status" name="form-control">
                <option value="0" {{$ivDetail->iv_status=='0' ?'selected':false}}>Successful</option>
                <option value="1" {{$ivDetail->iv_status=='1' ?'selected':false}}>Failure</option>
            </select>
            @error('iv_status')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Quatity</label>
            <input type="text" class="form-control" name="iv_quantity" value=" {{$ivDetail->iv_quantity}}">
            @error('iv_quantity')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.inventory-vouchers.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection