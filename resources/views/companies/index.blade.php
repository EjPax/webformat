@extends('layouts.app')

@section('title','Companies list')

@section('breadcrumbs')
    
    @parent
    
    <li class="active"> Companies list</li>

@endsection

@section('content')
    <h1>Companies List</h1>
    <p>this is a list of all companies (suppliers and customers) stored in our system.</p>
    @isset($companies)
        
        @if (count($companies))
            <ul class="list-group">
                @foreach ($companies as $company)
                    <div class="list-group-item">
                        <a href="{{ action('CompaniesController@show',$company->id) }}">{{ $company->name }}</a> 
                        <span class="label @if($company->type == 'supplier') label-info @else  label-default @endif text-uppercase pull-right">{{ $company->type }}</span>
                    </div>
                @endforeach
            </ul>
        @else
            <div class="alert alert-warning">
                <h4>Waring!</h4>
                <p>No company found</p>
            </div>
        @endif
    
    @endisset
    
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a class="btn btn-primary" href="{{action('CompaniesController@create')}}" role="button">+ Add a new company</a>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <p class="text-right">Total companies found: {{ count($companies) }}</p>    
    </div>


@endsection