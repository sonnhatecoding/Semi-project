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
    <a href="{{route('admin.unit.add')}} " class="btn btn-primary">Add new unit</a>
    <hr>

    <form action="" method="GET" class="mb-3">

        <div class="row">

            <div class="col-2">
                <select class="form-control" name="cp_id">
                    <option value="0">Company</option>
                    @if (!empty(getAllCompanys()))
                        @foreach (getAllCompanys() as $item)
                            <option value="{{$item->cp_id}}" {{request()->cp_id == $item->cp_id ? 'selected' : false}} {{request()->cp_id == 'active' ? 'selected' : false}}> {{$item->cp_name}}</option>
                        @endforeach
                    @endif
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
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th width= "5%">Edit</th>
                <th width= "5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($unitList))
                @foreach ($unitList as $key => $item)           
                <tr>
                    <td>{{$key+1}} </td>
                    <td>{{$item->unit_name}}</td>
                    <td>{{$item->company_name}}</td>
                    <td>{{$item->unit_email}}</td>
                    <td>{{$item->unit_phoneNumber}}</td>
                    <td>{{$item->unit_address}}</td>
                    <td>
                        <a href="{{route('admin.unit.edit', ['id' => $item->unit_id])}}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.unit.delete', ['id' => $item->unit_id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="8"> No unit</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$unitList->links()}}
    </div>
@endsection