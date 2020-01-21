@extends('layouts.admin');


@section('content')
    <h1>Create Users</h1>

    {!! Form::open(['method'=>'post','action'=>'AdminUsersController@store','files'=>true]) !!}
    <div class="form-group">
    {!! Form::label('name','Username') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image_id','Upload Image') !!}
        {!! Form::file('image_id',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role') !!}
        {!!  Form::select('role_id',[''=>'Pick a Role'] + $role, null, ['class'=>'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('isActive','isActive (No/Yes)') !!}
        {!! Form::select('isActive',array(''=>'Pick a Status',1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create New User',['class'=>'form-control btn btn-primary']) !!}
    </div>
    @include('includes.form_erros')
    @endsection



