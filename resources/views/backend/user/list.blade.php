@extends('layout.master')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-6">
                <a type="button" class="btn btn-primary" href=" {{route('users.create')}}">Add New user</a>
            </div>
{{--                {{$users->links('vendor.pagination.bootstrap-4')}}--}}
            </div>

        </div>
    </div>

    <div class="container">
        <table border="1px" class="table table-hover" style="width: 100%">

            <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="3">Action</th>
            </thead>
            @foreach($users as $user)
                <tbody class="table table-striped">
                <tr>
                    <td><b>{{$user->id}}</b></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                   <td>
                       @foreach($user->roles as $role)
                           {{$role->name}}<br>
                       @endforeach

                   </td>

                    <td><a type="button" class="btn btn-success"
                           href="{{route("users.edit",$user->id)}}">Edit</a>
                    </td>
                    <td><a type="button" class="btn btn-info" href="{{route('users.show',$user->id)}}">Detail</a>
                    </td>
                    <td><a type="button" class="btn btn-danger" onclick="return confirm(' Are you sure ? ')"
                           href="{{route('users.delete',$user->id)}}">Delete</a></td>

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


