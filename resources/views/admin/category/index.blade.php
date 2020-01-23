@extends('layouts.admin');



@section('content')


    <h1 class="text-center bg-info">Categorys</h1>
    <br>

    <div class="col-sm-6">
        <h1>Create Category</h1>
        {!! Form::open(['method'=>'post','action'=>['AdminCategoryControler@store']]) !!}
        {!! Form::label('name','category') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        {!! Form::submit('Add Category',['class'=>'form-control btn btn-primary']) !!}

    </div>

    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Category name</th>
                <th>Created At</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cat as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td><a href="{{route('category.edit',$c->id)}}">{{$c->name}}</a></td>
                    <td>{{ $c->created_at ?  $c->created_at->DiffForHumans() : "no date"}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





    @endsection
