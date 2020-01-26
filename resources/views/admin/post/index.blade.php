@extends('layouts.admin')


@section('content')

    <h1>All Post Post</h1>

    <div class="bg bg-danger">
            @if(session()->has('updatePost'))
                {{session('updatePost')}}
                @endif

                @if(session()->has('deletePost'))
                    {{session('deletePost')}}
                @endif

    </div>

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
                    <td><a href="{{route('post.edit',$p->id)}}">{{$p->title}}</a></td>
                    <td><a href="{{route('home.post',$p->id)}}">{{str_limit($p->body,20)}}</a></td>
                    <td>{{$p->user->name}}</td>
                    <td>{{$p->category->name}}</td>
                    <td>{{$p->created_at->DiffForHumans()}}</td>
                    <td>{{$p->updated_at->diffforhumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
{{$post->render()}}
        </div>
    </div>

@endsection
