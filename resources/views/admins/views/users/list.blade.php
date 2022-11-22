@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}}</div>
    @endif
    <br>
    <a href="{{route('admin.user.add')}} " class="btn btn-primary">Add new user</a>
    <hr>

    <form action="" method="GET" class="mb-3">
        <div class="row">

            <div class="col-2">
                <select class="form-control" name="ur_id">
                    <option value="0">Role</option>
                    @if (!empty(getAllUserRoles()))
                        @foreach (getAllUserRoles() as $item)
                            <option value="{{$item->ur_id}}" {{request()->ur_id == $item->ur_id ? 'selected' : false}} {{request()->ur_id == 'active' ? 'selected' : false}}> {{$item->ur_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-2">
                <select class="form-control" name="status">
                    <option value="0">Status</option>
                    <option value="active" {{request()->status == 'active' ? 'selected' : false}}>Active</option>
                    <option value="inactive" {{request()->status =='inactive' ? 'selected' : false}}>Inactive</option>
                </select>
            </div>

            <div class="col-2">
                <input type="search" class="form-control" name="keywords" placeholder="Search keyword..." value="{{request()->keywords}}">
            </div>

            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>

        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th width= "4%">STT</th>
                <th width= "15%">Name</th>
                <th width= "8%">Role</th>
                <th>Status</th>
                <th>Email</th>
                <th width= "12%">Phone Number</th>
                <th width= "8%">Address</th>
                <th width= "10%">Time</th>
                <th width= "5%">Edit</th>
                <th width= "5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($userList))
                @foreach ($userList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->role}}</td>
                        <td>{!! $item->user_status==0?'<button class="btn btn-danger btn-sm">Inactive</button>':'<button class="btn btn-success btn-sm">Active</button>' !!}</td>
                        <td>{{$item->user_email}}</td>
                        <td>{{$item->user_phoneNumber}}</td>
                        <td>{{$item->user_address}}</td>
                        <td>{{$item->user_createAt}}</td>
                        <td>
                            <a href="{{route('admin.user.edit', ['id' => $item->user_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.user.delete', ['id' => $item->user_id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="10"> No user</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$userList->links()}}
    </div>
@endsection