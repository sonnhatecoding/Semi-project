@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>

    @if ($errors ->any())
        <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
    @endif

    <form action="{{route('admin.user.postEdit')}}" method="post">

        <div class="mb-3">
            <label for="">Full name</label>
            <input type="text" class="form-control" name="user_name" placeholder="Full name..." value="{{old('user_name') ?? $userDetail ->user_name}} ">
            @error('user_name')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="user_email" placeholder="Email..."  value="{{old('user_email') ?? $userDetail->user_email}}">
            @error('user_email')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Role</label>
            <select name="ur_id" name="form-control">
                <option value="0">Choose role</option>
                @if (!empty($allUserRole))
                    @foreach ($allUserRole as $item)
                    <option value="{{$item->ur_id}}" {{old('ur_id')==$item->ur_id || $userDetail->ur_id ?'selected':false}}> {{$item->ur_name}}</option>
                    @endforeach
                @endif
            </select>
            @error('user_role')
                <span style="color: red">{{$message}} </span>
            @enderror

            <label for="">Status: </label>
            <select name="user_status" name="form-control">
                <option value="0" {{old('user_status')==0 || $userDetail->user_status ?'selected':false?'selected':false}}>Inactive</option>
                <option value="1" {{old('user_status')==1 || $userDetail->user_status ?'selected':false?'selected':false}}>Active</option>
            </select>
            @error('user_status')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="user_phoneNumber" placeholder="Phone Number..." value="{{old('user_phoneNumber')?? $userDetail->user_phoneNumber}}">
            @error('user_phoneNumber')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="user_password" placeholder="Password..." value="{{old('user_password') ?? $userDetail->user_password}}">
            @error('user_password')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="confirm-password" placeholder="Confirm password..." value="{{old('user_password') ?? $userDetail->user_password}}">
            @error('confirm-password')
                <span style="color: red">{{$message}} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="user_address" placeholder="Address..." value="{{old('user_address') ?? $userDetail->user_address}}">
            @error('user_address')
                <span style="color: red">{{$message}} </span>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('admin.user.index')}} " class="btn btn-warning">Back</a>
        @csrf
    </form>
    <br>
@endsection