@extends('layouts.admin')



@section('content')
<h1>all comments</h1>

@if(count($comment))

<div class="container">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Content</th>
            <th>auther</th>
            <th>email</th>
            <th>View Post</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comment as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->body}}</td>
                <td>{{$c->auther}}</td>
                <td>{{$c->email}}</td>
                <td><a href="{{route('home.post',$c->post->id)}}">{{$c->post->title}}</a></td>
                <td>{{$c->created_at->diffForHumans()}}</td>
                <td>@if($c->isActive == 1)
                        {{Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$c->id]])}}
                        <input type="hidden" name="isActive" value="0">
                        {{Form::submit('reject',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
                        @else
                        {{Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$c->id]])}}
                        <input type="hidden" name="isActive" value="1">
                        {{Form::submit('Accept',['class'=>'btn btn-success'])}}
                        {{Form::close()}}
                @endif
                </td>
                <td>
                    {{Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$c->id]])}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {{Form::close()}}
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="text-center">  No Comment </div>
    @endif


</div>







    @endsection
