@extends('layout.master')
@section('content')

    <form method="post">
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Create New User</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                        <p class="text text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="email">{{old('email')}}</textarea>
                        @error('email')
                        <p class="text text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            @foreach($roles as $role)
                                <input type="checkbox" name="role_id[]" class="custom-checkbox custom-control-inline"
                                       value="{{$role->id}}">{{$role->name}}<br>

                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                            <a type="button" class="btn btn-danger" href="{{route('users.index')}}">Back</a>
                        </div>
                    </div>

                </div>
            </div>

    </form>
@endsection


