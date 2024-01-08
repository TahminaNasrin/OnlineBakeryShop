@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
    <h1>Review List</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Review ID</th>
                <th scope="col">Date</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Review</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $key=>$review)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$review->created_at}}</td>
                <td>{{$review->user->id}}</td>
                <td>{{$review->user->name}}</td>
                <td>{{$review->review}}</td>

                <td>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>


@endsection