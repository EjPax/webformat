@extends('layouts.app')

@section('title','Companies')

@section('content')
    <h1>Customers List</h1>
    <p>this is a list of all customers companies stored in our system.</p>
    @isset($companies)
        
        @if (count($companies))
            <ul class="list-group">
                @foreach ($companies as $company)
                    <div class="list-group-item">
                        <a href="{{ action('CompaniesController@show',$company->id) }}">{{ $company->name }}</a> 
                        <span class="label @if($company->type == 'supplier') label-info @else  label-default @endif text-uppercase pull-right">{{ $company->type }}</span>
                        <!--
                            <span>{{ $company->name }}</span><span>{{ $company->type }}</span>
                            <a class="btn btn-default btn-sm" role="button" href="{{ action('CompaniesController@edit',$company->id) }}">edit</a> 
                            <form action="{{ action('CompaniesController@destroy',$company->id) }}" method="POST" role="form" class="form-inline">
                                @csrf
                                @method('delete')
                                <div class="form-inline">
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </div>
                            </form>
                        -->
                    </div>
                @endforeach
            </ul>    
        @else
            <div class="alert alert-warning">NO ITEMS FOUND</div>
        @endif
    
    @endisset
    
    
<a class="btn btn-primary" href="{{action('CompaniesController@create')}}" role="button">+ Add a new company</a>


@endsection