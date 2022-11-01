@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.order.postEdit')}}" method="post" >

        <div class="mb-3">
            <label for=""> Status: </label>
            <select name="order_status" name="form-control">
                <option value="0" {{$orderDetail->order_status=='0' ?'selected':false}}>Successful</option>
                <option value="1" {{$orderDetail->order_status=='1' ?'selected':false}}>Failure</option>
            </select>
            @error('order_status')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Quatity</label>
            <input type="text" class="form-control" name="order_quantity" value=" {{$orderDetail->order_quantity}}">
            @error('order_quantity')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.order.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection