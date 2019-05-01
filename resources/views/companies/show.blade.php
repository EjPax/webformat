@extends('layouts.app')

@section('title','Companies')

@section('breadcrumbs')
    @parent
    <li>
        <a href="{{action('CompaniesController@index')}}">Companies</a>
    </li>
    <li class="active">{{ $name }}</li>
@endsection

@section('content')
    <div class="jumbotron">
        <h1>{{ $name }}</h1>
        
        @if($address || $city || $zip || $country)
            
            <address>
                <strong>Address</strong><br>
                @isset($address)
                    <span>{{ $address }}</span><br/>
                @endisset
                
                @isset($city)
                    <span>{{ $zip }}</span> <span>{{ $city }}</span><br/>
                @endisset
                
                @isset($country)
                    <span>{{ $country }}</span><br/>
                @endisset
            </address>
        
        @endif
        
        @isset($phone)
            <address>
                <strong>Phone</strong><br>
                <span>{{ $phone }}</span>
            </address>
        @endisset
        
        @isset($email)
            <address>
                <strong>Mail </strong><br>
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </address>
        @endisset
        
        @isset($website)
            <address>
                <strong>Website </strong><br>
                <a href="{{ $website }}">{{ $website }}</a>
            </address>
        @endisset
        
        <p>{{ $type['name'] }} since {{ $since }}</p>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <a class="btn btn-primary btn-block" role="button" href="{{ action('CompaniesController@edit',$id) }}"> Edit </a> 
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <form action="{{ action('CompaniesController@destroy',$id) }}" method="POST" role="form" class="form-inline">
                    @csrf
                    @method('delete')
                    <div class="form-inline">
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if( count($agents) )
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>Agents</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Nr.</th>
                            <th>E-Mail</th>
                            <th>Status</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($agents as $agent)
                        
                        <tr>
                            <td>{{ $agent['first_name']  }}</td>
                            <td>{{ $agent['last_name']  }}</td>
                            <td>{{ $agent['phone']  }}</td>
                            <td>{{ $agent['email']  }}</td>
                            <td>@if($agent['active']) <span class="badge">Active</span> @else <span class="badge">Not Active</span> @endif</td>
                            <td>{{ $agent['from_date']  }}</td>
                            <td>{{ $agent['to_date']  }}</td>
                            <td>
                                <a class="btn btn-default btn-xs" href="{{ action('AgentsController@edit',[$id,$agent['id']]) }}" role="button">edit</a>
                            </td>
                            <td>
                                <form action="{{ action('AgentsController@destroy',[$id,$agent['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @else

        <div class="alert alert-info" role="alert">
            <h4>Heads Up!</h4>
            <p>There are no agent for this company <a href="{{ action('AgentsController@create',[$id]) }}" role="link">add new agent</a></p>
        </div>

    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a class="btn btn-primary btn-block" href="{{ action('AgentsController@create',[$id]) }}" role="button">add new agent</a>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a class="btn btn-default btn-block" role="button" href="{{ action('CompaniesController@index') }}" style="margin: 10px 0"> Back </a> 
        </div>
    </div>

@endsection