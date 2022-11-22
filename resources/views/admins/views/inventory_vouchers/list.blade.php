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
    <form action="" method="GET" class="mb-3">
        <div class="row">

            <div class="col-2">
                <select class="form-control" name="types">
                    <option value="0">Type</option>
                    <option value="import" {{request()->types =='import' ? 'selected' : false}}>Import</option>
                    <option value="export" {{request()->types =='export' ? 'selected' : false}}>Export</option>
                </select>
            </div>
            
            <div class="col-2">
                <select class="form-control" name="status">
                    <option value="0">Status</option>
                    <option value="successful" {{request()->status =='successful' ? 'selected' : false}}>Successful</option>
                    <option value="failure" {{request()->status =='failure' ? 'selected' : false}}>Failure</option>
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
                <th>Type</th>
                <th>Status</th>
                <th>Company</th>
                <th>Unit</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Address</th>
                <th>Admin</th>
                <th width= "10%">Time</th>
                <th width= "5%">Detail</th>
                <th width= "5%">Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($ivList))
                @foreach ($ivList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{!! $item->iv_type==0?'<button class="btn btn-secondary btn-sm">Import</button>':'<button class="btn btn-info btn-sm">Export</button>' !!}</td>
                        <td>{!! $item->iv_status==0?'<button class="btn btn-success btn-sm">Successful</button>':'<button class="btn btn-danger btn-sm">Failure</button>' !!}</td>
                        <td>{{$item->cp_name}}</td>
                        <td>{{$item->unit_name}}</td>
                        <td>{{$item->unit_email}}</td>
                        <td>{{$item->unit_phoneNumber}}</td>
                        <td>{{$item->iv_quantity}}</td>
                        <td>${{$item->iv_total}}</td>
                        <td>{{$item->unit_address}}</td>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->iv_date}}</td>
                        <td>
                            <a href="{{route('admin.inventory-vouchers.inventory-vouchers-detail.index', ['id' => $item->iv_id])}}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                        <td>
                            <a href="{{route('admin.inventory-vouchers.edit', ['id' => $item->iv_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="14"> No inventory voucher</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$ivList->links()}}
    </div>
@endsection