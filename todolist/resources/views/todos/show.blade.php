@extends('layouts.app')

@section('content')

    <a href="/" class="btn btn-default">Go Back</a>

    <h1><a href="/todo/{{ $todo->id }}">{{ $todo->text }}</a></h1>

    <span class="label label-danger">{{ $todo->due }}</span>

    <hr>

    <p>{{ $todo->body }}</p>

    <br><br>

    <a href="/todo/{{ $todo->id }}/edit" class="btn btn-default">Edit</a>

    {!! Form::open([
        'method' => 'POST',
        'action' => ['TodosController@destroy', $todo->id],
        'class' => 'pull-right'
    ]) !!}


    {{ Form::hidden('_method', 'DELETE') }}

    {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}


    {!! Form::close() !!}

@endsection