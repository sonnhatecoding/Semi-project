@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.inventory-vouchers.inventory-vouchers-detail.postEdit')}}" method="post" >

        <div class="mb-3">
            <label for="">Quatity</label>
            <input type="text" class="form-control" name="iv_quantity" value=" {{$ivDetail->iv_quantity}}">
            @error('iv_quantity')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" class="form-control" name="iv_price" value=" {{$ivDetail->iv_price}}">
            @error('iv_price')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.inventory-vouchers.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection