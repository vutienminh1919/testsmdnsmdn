@extends('layout.master')
@section('content')
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" id="search-input" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" id="search-btn" type="submit">Search</button>
    </form>

    <div class="container">
        <table border="1px" class="table table-hover" style="width: 100%">

            <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>

            </thead>
                <tbody class="list-repo">

                </tbody>

        </table>
    </div>
@endsection
