@extends('layouts.app')

@section('content')
    <h1>About</h1>
    <p>Consectetur adipisicing elit. Ab atque aut beatae blanditiis dolorum eius eveniet expedita impedit in modi molestias nobis non numquam odio, perferendis, quia temporibus veniam voluptates.</p>
@endsection

@section('sidebar')
    @parent
    <p>This is the appended to the sidebar</p>
@endsection