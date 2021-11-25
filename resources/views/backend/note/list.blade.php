@extends('layout.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <a type="button" class="btn btn-primary" href=" {{route('notes.create')}}">Add New Note</a>
            </div>
            <div class="col-4">
                {{$notes->onEachSide(1)->links('vendor.pagination.bootstrap-4')}}
            </div>

        </div>
    </div>

    <div class="container">
        <table border="1px" class="table table-hover" style="width: 100%">

            <thead class="thead-dark">
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th colspan="3">Action</th>
            </thead>
            @foreach($notes as $note)
                <tbody class="table table-striped">
                <tr>
                    <td><b>{{$note->id}}</b></td>
                    <td>{{$note->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($note->content, 20)}}
                    </td>

                    <td>{{$note->category->name}}</td>

                    <td><a type="button" class="btn btn-success"
                           href="{{route("notes.showFormEdit",$note->id)}}">Edit</a>
                    </td>
                    <td><a type="button" class="btn btn-info" href="{{route('notes.show',$note->id)}}">Detail</a>
                    </td>
                    <td><a type="button" class="btn btn-danger" onclick="return confirm(' Are you sure ? ')"
                           href="{{route('notes.delete',$note->id)}}">Delete</a></td>

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
                {{$notes->links()}}

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

