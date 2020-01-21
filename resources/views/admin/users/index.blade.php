@extends("layouts.admin")

@section("content")
<h1>Users</h1>
<div class="container">
    <h2>Striped Rows</h2>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
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
            <td>{{$u->name}}</td>
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
