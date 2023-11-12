@extends('admin.master')
@section('content')
<h1>Users Info</h1>
<a href="{{route('users.form')}}">
   <button class='btn btn-success'>Add New User</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $key=>$user)
     <tr>
        <td>{{$key+1}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->email}}</td>
        <td>
          <img style="border-radius: 60px;" width="7%" src="{{url('/uploads/'.$user->image)}}" alt="">
        </td>
        
        <td>
          <a class="btn btn-success" href="">View</a>
          <a class="btn btn-warning" href="">Edit</a>
          <a  class="btn btn-danger"href="">Delete</a>
        </td>
     </tr>
   @endforeach

  </tbody>
</table>

@endsection
