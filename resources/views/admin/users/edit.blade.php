@extends('layouts.admin');


@section('content')
    <h1>Create Users</h1>

    <div class="col-sm-3">
        <img src="{{$user->photo  ? $user->photo->file : "https://via.placeholder.com/150"}}" alt="">
    </div>
<div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Username') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Update  User',['class'=>'form-control btn btn-primary']) !!}
    </div>
    {{Form::close()}}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete This  User',['class'=>'form-control btn btn-Danger']) !!}
    </div>
    {{Form::close()}}


    @include('includes.form_erros')
</div>
@endsection



