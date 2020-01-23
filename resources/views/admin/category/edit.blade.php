@extends('layouts.admin')


@section('content')

    <h1>Edit Category</h1>

    <div class="container">
            {!! Form::model($cat,['method'=>'PATCH','action'=>['AdminCategoryControler@update',$cat->id]]) !!}
            {!! Form::label('name','Category') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! Form::submit('Update Category',['class'=>'form-control btn btn-primary']) !!}
        {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryControler@destroy',$cat->id]]) !!}

            {!! Form::submit('delete Category',['class'=>'form-control btn btn-danger']) !!}
        {!! Form::close() !!}

    </div>
    @stop
