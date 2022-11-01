@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.order.order-detail.postEdit')}}" method="post" >

        <div class="mb-3">
            <label for="">Quatity</label>
            <input type="text" class="form-control" name="od_quantity" value=" {{$odDetail->od_quantity}}">
            @error('od_quantity')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Pro-price</label>
            <input type="text" class="form-control" name="pro_price" value=" {{$odDetail->pro_price}}">
            @error('pro_price')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>
        {{-- <div>
            <input type="hidden" value=" {{$odDetail->pro_price}}">
        </div> --}}

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.order.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection