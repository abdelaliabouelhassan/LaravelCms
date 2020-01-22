@extends("layouts.admin")

@section("content")
<h1>Users</h1>
<div class="container">

@if(Session::has('delete_user'))
    <p class="bg bg-danger">{{session("delete_user")}}</p>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>image</th>
            <th>name</th>
            <th>Email</th>
            <th>Role</th>
            <th>IsActive</th>
            <th>created</th>
            <th>updated</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td><img src="{{ $u->image_id != 0 ? $u->photo->file : "https://via.placeholder.com/150" }}" alt=""></td>
            <td><a href="{{route("user.edit",$u->id)}}">{{$u->name}}</a></td>
            <td>{{$u->email}}</td>
            <td>{{$u->role->name}}</td>
            <td>{{$u->isActive == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$u->created_at->DiffForHumans()}}</td>
            <td>{{$u->updated_at->diffforhumans()}}</td>
        </tr>
     @endforeach
        </tbody>
    </table>
</div>

    @endsection
