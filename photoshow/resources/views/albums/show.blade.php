@extends('layouts.app')

@section('content')
    <h1>{{ $album->name }}</h1>

    <a href="/" class="button secondary">Go Back</a>

    <a href="/photos/create/{{ $album->id }}" class="button">Upload Photo To Album</a>

    <hr>

@stop