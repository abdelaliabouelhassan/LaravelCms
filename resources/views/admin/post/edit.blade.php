@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>
    <div class="row">

        <div class="col-sm-3">
            <img src="{{ $post->photo->file }}" alt="">
        </div>
        <div class="col-sm-9">

        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostCotroller@update',$post->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!!  Form::select('category_id', $cat , null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Image') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Body') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update  Post',['class'=>'form-control btn btn-primary']) !!}
            {{Form::close()}}
        </div>

        <div class="form-group">
            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostCotroller@destroy',$post->id]]) !!}
            {!! Form::submit('Delete  Post',['class'=>'form-control btn btn-danger']) !!}
            {{Form::close()}}
        </div>



        <div class="row">
            @include('includes.form_erros')

        </div>
        </div>




@endsection
