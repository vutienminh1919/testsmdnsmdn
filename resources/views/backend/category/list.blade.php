@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <a type="button" class="btn btn-primary" href=" {{route('categories.create')}}">Add New Category</a>
            </div>
            <div class="col-4">

            </div>


        </div>
    </div>

    <div class="container">
        <table border="1px" class="table table-hover" style="width: 100%">

            <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>

            <th colspan="3">Action</th>
            </thead>
            @foreach($categories as $key=>$category)
                <tbody class="table table-striped">
                <tr>
                    <td><b>{{++$key}}</b></td>

                    <td>{{$category->name}}</td>

                    <td>{{$category->description}}</td>

                    <td><a type="button" class="btn btn-success"
                           href="{{route("categories.showFormEdit",$category->id)}}">Edit</a>
                    </td>
                    <td><a type="button" class="btn btn-info" href="{{route('categories.show',$category->id)}}">Detail</a>
                    </td>
                    <td><a type="button" class="btn btn-danger" onclick="return confirm(' Are you sure ? ')"
                           href="{{route('categories.delete',$category->id)}}">Delete</a></td>

                </tr>
                </tbody>

            @endforeach
        </table>
    </div>
@endsection
