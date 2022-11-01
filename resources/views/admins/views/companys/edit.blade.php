@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.company.postEdit')}}" method="post">

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="cp_name" placeholder="Name of company..." value="{{old('cp_name') ?? $companyDetail->cp_name }}">
            @error('cp_name')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="cp_email" placeholder="Email..." value="{{old('cp_email')  ?? $companyDetail->cp_email }}">
            @error('cp_email')
                <span style="color: red">{{$message}} </span>
            @enderror

        </div>

        <div class="mb-3">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="cp_phoneNumber" placeholder="Phone Number..." value="{{old('cp_phoneNumber')  ?? $companyDetail->cp_phoneNumber }}">
            @error('cp_phoneNumber')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="cp_address" placeholder="Address..." value="{{old('cp_address') ?? $companyDetail->cp_address }}">
            @error('cp_address')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin.company.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection