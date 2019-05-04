@extends('layouts.app')

@section('title','About')

@section('breadcrumbs')
    
    @parent
    <li>About</li>
    
@endsection

@section('content')
    <div class="well">
        <p class="text-center">This simple web app was built to manage an address book of companies.</p>
        <p class="text-center">this is a simple stati page, built to implement a simple routing class to manage stac pages</p>
    </div>
@endsection