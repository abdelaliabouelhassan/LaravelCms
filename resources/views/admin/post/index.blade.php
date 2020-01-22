@extends('layouts.admin')


@section('content')

    <h1>All Post Post</h1>


    <div class="container">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Body</th>
                <th>User Of This Post</th>
                <th>Category</th>
                <th>created</th>
                <th>updated</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td><img height="100" src="{{$p->photo->file}}" alt=""></td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->body}}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{$p->category->name}}</td>
                    <td>{{$p->created_at->DiffForHumans()}}</td>
                    <td>{{$p->updated_at->diffforhumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
