@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}}</div>
    @endif

    <form action="" method="GET" class="mb-3">
        <div class="row">

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
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Address</th>
                <th width= "10%">Time</th>
                <th width= "5%">Detail</th>
                <th width= "5%">Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($orderList))
                @foreach ($orderList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->user_email}}</td>
                        <td>{{$item->user_phoneNumber}}</td>
                        <td>{{$item->order_quantity}}</td>
                        <td>{{$item->order_total}}</td>
                        <td>{!! $item->order_status==0?'<button class="btn btn-success btn-sm">Successful</button>':'<button class="btn btn-danger btn-sm">Failure</button>' !!}</td>
                        <td>{{$item->user_address}}</td>
                        <td>{{$item->order_createAt	}}</td>
                        <td>
                            <a href="{{route('admin.order.order-detail.index', ['id' => $item->order_id])}}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                        <td>
                            <a href="{{route('admin.order.edit', ['id' => $item->order_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="11"> No order</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{$orderList->links()}}
    </div>
@endsection