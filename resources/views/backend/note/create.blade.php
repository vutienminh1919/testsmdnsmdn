@extends('layout.master')
@section('content')
    @if (count($errors) > 0)
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" >
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Create New Note</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Title</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Content</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="content"></textarea>
                    </div>
                </div>
                <label><strong>Select Category :</strong></label><br/>

                <select class="form-control" name="category" multiple="">

                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                        <a type="button" class="btn btn-danger" href="{{route('notes.index')}}">Back</a>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection

