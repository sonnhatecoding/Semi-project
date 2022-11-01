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
                <th>Company</th>
                <th>Unit</th>
                <th width= "14%">Product </th>
                <th>Color </th>
                <th>Brand </th>
                <th>RAM</th>
                <th>Operating System</th>
                <th>Image </th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($ivDetailList))
                @foreach ($ivDetailList as $key => $item)           
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{{$item->cp_name}}</td>
                        <td>{{$item->unit_name}}</td>
                        <td>{{$item->pro_name}}</td>
                        <td>{{$item->color_name}}</td>
                        <td><img src="images/brand/{{$item->brand_logo}}" style ="width: 100px;"></td>
                        <td>{{$item->pro_ram}}</td>
                        <td>{{$item->pro_oSystem}}</td>
                        <td><img src="images/product/{{$item->pro_image}}" style ="width: 100px;"></td>
                        <td>{{$item->iv_price}}</td>
                        <td>{{$item->iv_quantity}}</td>
                        <td>{{$item->iv_total}}</td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="12"> No inventory vouchers detail</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{route('admin.inventory-vouchers.index')}} " class="btn btn-warning">Back</a>
@endsection