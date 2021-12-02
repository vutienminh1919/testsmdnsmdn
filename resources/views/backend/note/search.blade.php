@extends('layout.master')
@section('content')
    <div class="container">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
            </tr>
            </thead>
            @foreach($noteResult as $note)
                <tbody>
                <tr>
{{--                    <td>{{$note->id}}</td>--}}
                    <td>{{$note->title}}</td>
                    <td>{{$note->content}}</td>
                </tr>
                </tbody>
            @endforeach
        </table>

    </div>
@endsection
