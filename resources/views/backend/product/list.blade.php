@extends('backend.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <a type="button" class="btn btn-primary" href=" {{route('products.create')}}">Add New Product</a>
            </div>
            <div class="col-4">
                {{$products->links('vendor.pagination.bootstrap-4')}}
            </div>


        </div>
    </div>

    <div class="container">
        <table border="1px" class="table table-hover" style="width: 100%">

            <thead class="thead-dark">
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            {{--            <th>Description</th>--}}
            <th>Price</th>

            {{--            <th>Create at </th>--}}
            {{--            <th>Update at</th>--}}
            <th colspan="3">Action</th>
            </thead>
            @foreach($products as $product)
                <tbody class="table table-striped">
                <tr>
                    <td><b>{{$product->id}}</b></td>
                    <td><img style="width: 100px" src="img/{{$product->image}}" alt=""></td>
                    <td>{{$product->name}}</td>
                    {{--                    <td>{{$product->description}}</td>--}}
                    <td>{{$product->price}}</td>
                    {{--                    <td>{{$product->created_at}}</td>--}}
                    {{--                    <td>{{$product->updated_at}}</td>--}}
                    <td><a type="button" class="btn btn-success" href="{{route("products.showFormEdit",$product->id)}}">Edit</a>
                    </td>
                    <td><a type="button" class="btn btn-info" href="{{route('products.show',$product->id)}}">Detail</a>
                    </td>
                    <td><a type="button" class="btn btn-danger" onclick="return confirm(' Are you sure ? ')"
                           href="{{route('products.delete',$product->id)}}">Delete</a></td>

                </tr>
                </tbody>

            @endforeach
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">

            </div>
            <div class="">
                {{$products->links('vendor.pagination.bootstrap-4')}}

            </div>
            <div>
                <form action="" method="post">
                    <input class="" style="width: 50px" type="text" name="page">
                    <button class="btn btn-primary" type="submit">Go</button>
                </form>
            </div>

        </div>

    </div>

@endsection








