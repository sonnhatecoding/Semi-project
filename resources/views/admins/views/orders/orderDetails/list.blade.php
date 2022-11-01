@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th width= "4%">STT</th>
                {{-- <th width= "10%">Name</th> --}}
                <th width= "14%"> Name of Product </th>
                <th>Color</th>
                <th>Brand</th>
                <th>RAM</th>
                <th>Internal memory</th>
                <th>Operating System</th>
                <th>Warranty Period</th>
                <th>Image</th>
                <th>Price</th>
                <th>Reduced Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th width= "4%">Edit</th>
                <th width= "4%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($orderDetailList))
                @foreach ($orderDetailList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        {{-- <td>{{$item->user_name}}</td> --}}
                        <td>{{$item->pro_name}}</td>
                        <td>{{$item->color_name}}</td>
                        <td><img src="images/brand/{{$item->brand_logo}}" style ="width: 100px;"></td>
                        <td>{{$item->pro_ram}}</td>
                        <td>{{$item->pro_iMemory}}</td>
                        <td>{{$item->pro_oSystem}}</td>
                        <td>{{$item->pro_warrantyPeriod}}</td>
                        <td><img src="images/product/{{$item->pro_image}}" style ="width: 100px;"></td>
                        <td>{{$item->pro_price}}</td>
                        <td>{{$item->pro_reducedPrice}}</td>
                        <td>{{$item->od_quantity}}</td>
                        <td>{{$item->od_total}}</td>
                        <td>
                            <a href="{{route('admin.order.order-detail.edit', ['id' => $item->od_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.order.order-detail.delete', ['id' => $item->od_id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="12"> No order detail</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{route('admin.order.index')}} " class="btn btn-warning">Back</a>
@endsection