@extends('layouts.app')

@section('content')
    <h1>Home</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium at deserunt omnis quod similique. Accusamus alias earum eos ipsum iste iure iusto maiores natus nobis officiis placeat provident, quisquam quos.</p>
@endsection

@section('sidebar')
    @parent
    <p>This is the appended to the sidebar</p>
@endsection