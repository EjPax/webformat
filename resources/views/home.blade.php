@extends('layouts.app')

@section('title','Company Managment')

@section('breadcrumbs')
    
    @parent
    
@endsection

@section('content')
    <h1>Welcome to {{ env('APP_NAME') }} App</h1>
    <p>This is a simple address book app built to manage companies.</p>
    <p>Companies are divided into <strong>customers</strong> and <strong>suppliers</strong>.</p>
    <p>Foreach company you can also define a set of <strong>agents</strong>.</p>
@endsection