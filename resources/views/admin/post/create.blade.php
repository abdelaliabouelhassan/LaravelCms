@extends('layouts.admin')


@section('content')

    <h1>Create Post</h1>
<div class="row">

    {!! Form::open(['method'=>'post','action'=>'AdminPostCotroller@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!!  Form::select('category_id',[''=>'option'] + $cat , null, ['class'=>'form-control']); !!}
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
        {!! Form::submit('Create New Post',['class'=>'form-control btn btn-primary']) !!}
    </div>

    {{Form::close()}}

    <div class="row">
        @include('includes.form_erros')

    </div>

    @endsection
