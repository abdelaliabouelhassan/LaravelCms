@extends('layouts.admin')
@section("style")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    @stop

@section('content')

    <h1>Uploads</h1>


    <div class="container">

        {!! Form::open(['method'=>'post','action'=>'AdminMediaController@store','files'=>true,'class'=>'dropzone']) !!}
        {{Form::close()}}


    </div>






    @stop




@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @stop
