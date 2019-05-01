@extends('layouts.app')

@section('title','Companies')

@section('content')
    <h1>Suppliers List</h1>
    <p>this is a list of all suppliers companies stored in our system.</p>
    @isset($companies)
        
        @if (count($companies))
            <ul class="list-group">
                @foreach ($companies as $company)
                    <div class="list-group-item">
                        <a href="{{ action('CompaniesController@show',$company->id) }}">{{ $company->name }}</a> 
                        <span class="label label-info text-uppercase pull-right">{{ $company->type->name }}</span>
                    </div>
                @endforeach
            </ul>    
        @else
            <div class="alert alert-warning">NO ITEMS FOUND</div>
        @endif
    
    @endisset
    
    
<a class="btn btn-primary" href="{{action('CompaniesController@create')}}" role="button">+ Add a new company</a>


@endsection