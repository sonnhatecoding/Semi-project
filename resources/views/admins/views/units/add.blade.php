@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="" method="post">

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="unit_name" placeholder="Name of unit..." value="{{old('unit_name')}}">
            @error('unit_name')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="unit_email" placeholder="Email..." value="{{old('unit_email')}}">
            @error('unit_email')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Company: </label>
            <select name="cp_id" name="form-control">
                <option value="0">Choose company</option>
                @if (!empty($allCompany))
                    @foreach ($allCompany as $item)
                    <option value="{{$item->cp_id}}" {{old('cp_id')==$item->cp_id?'selected':false}}> {{$item->cp_name}}</option>
                    @endforeach
                @endif
            </select>
            @error('cp_id')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="unit_phoneNumber" placeholder="Phone Number..." value="{{old('unit_phoneNumber')}}">
            @error('unit_phoneNumber')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="unit_address" placeholder="Address..." value="{{old('unit_address')}}">
            @error('unit_address')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        <a href="{{route('admin.unit.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection