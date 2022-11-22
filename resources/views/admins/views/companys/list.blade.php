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
    <a href="{{route('admin.company.add')}} " class="btn btn-primary">Add new company</a>
    <hr>

    <form action="" method="GET" class="mb-3">
        <div class="row">

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
                <th width= "16%">Name</th>
                <th width= "25%">Email</th>
                <th>Phone Number</th>
                <th width= "20%">Address</th>
                <th width= "5%">Edit</th>
                <th width= "5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($companyList))
                @foreach ($companyList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{{$item->cp_name}}</td>
                        <td>{{$item->cp_email}}</td>
                        <td>{{$item->cp_phoneNumber}}</td>
                        <td>{{$item->cp_address}}</td>
                        <td>
                            <a href="{{route('admin.company.edit', ['id' => $item->cp_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.company.delete', ['id' => $item->cp_id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="7">No company</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$companyList->links()}}
    </div>
@endsection