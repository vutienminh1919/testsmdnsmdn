@extends('backend.layout.master')
@section('content')
<form  class="form-horizontal" method="post">
    <div class="col-md-10 offset-2">
        <div class="panel panel-default">
            <h2>Edit Product</h2>
    @csrf
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    <textarea class="form-control" name="description" >{{$product->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-md-4 control-label">Price</label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Change
                    </button>
                    <a  type="button" class="btn btn-danger" href="{{route('products.index')}}">Back</a>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection

