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
    <hr>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th width= "20%">Name</th>
                <th>Image Main</th>
                <th>Image 01</th>
                <th>Image 02</th>
                <th>Image 03</th>
                <th>Image 04</th>
                <th width= "5%">Edit</th>
                <th width= "5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($imageDetail))
                    <tr>
                        <td width= "12%">{{$imageDetail->pro_name}}</td>
                        <td><img src="images/product/{{$imageDetail->pro_image}}" style ="width: 100px;"> </td>
                        <td><img src="images/product/{{$imageDetail->pro_image1}}" style ="width: 100px;"></td>
                        <td><img src="images/product/{{$imageDetail->pro_image2}}" style ="width: 100px;"></td>
                        <td><img src="images/product/{{$imageDetail->pro_image3}}" style ="width: 100px;"></td>
                        <td><img src="images/product/{{$imageDetail->pro_image4}}" style ="width: 100px;"></td>
                        <td>
                            <a href="{{route('admin.product.edit', ['id' => $imageDetail->pro_id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.product.delete', ['id' => $imageDetail->pro_id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
            @else 
                <tr>
                    <td colspan="8"> No image</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{route('admin.product.index')}} " class="btn btn-warning">Back</a>
@endsection