@extends('layout.master')
@section('content')
    <form class="form-horizontal" method="post">
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Edit Note</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Title</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="title" value="{{$note->title}}">
                        @error('title')
                        <p class="text text-danger" >{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Content</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="content">{{$note->content}}</textarea>
                        @error('content')
                        <p class="text text-danger" >{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <label style="margin-left: 15px">Select Category :</label><br/>

                <select style="margin-left: 15px;margin-bottom: 30px;width: 250px" class="custom-select"
                        name="category">
                    <option selected>Category</option>

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Change
                        </button>
                        <a type="button" class="btn btn-danger" href="{{route('notes.index')}}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

