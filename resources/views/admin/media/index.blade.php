@extends('layouts.admin');



@section('content')


    <h1 class="text-center bg-info">Media</h1>
    <br>

    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>image</th>
                <th>Created At</th>
                <th>Delete </th>
            </tr>
            </thead>
            <tbody>
            @foreach($photo as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td> <img height="50" src="{{$p->file}}" alt=""></td>
                    <td>{{ $p->created_at ?  $p->created_at->DiffForHumans() : "no date"}}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$p->id]]) !!}
                        {!! Form::submit('Delete  Image',['class'=>'form-control btn btn-danger']) !!}

                        {{Form::close()}}


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





@endsection
