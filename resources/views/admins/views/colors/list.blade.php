@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}} </h1>
    @if(session('msg'))
        <div class="alert alert-success"> {{session('msg')}}</div>
    @endif

    <a href="{{route('admin.color.add')}}" class="btn btn-primary">Add new color</a>
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
                <th>Name</th>
                <th width= "5%">Edit</th>
                <th width= "5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($colorList))
                @foreach ($colorList as $key => $item)           
                <tr>
                    <td>{{$key+1}} </td>
                    <td>{{$item->color_name}}</td>
                    <td>
                        <a href="{{route('admin.color.edit', ['id' => $item->color_id])}}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.color.delete', ['id' => $item->color_id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="4"> No color</td>
                </tr>
            @endif
        </tbody>
    </table>
     <div class="d-flex justify-content-center">
        {{$colorList->links()}}
    </div>
@endsection