@extends('layouts.app')

@section('title','Companies')

@section('content')
    <div class="jumbotron">
        <h1>{{ $name }}</h1>
        <address>
            <strong>Address</strong><br>
            1355 Market Street, Suite 900<br>
            San Francisco, CA 94103<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
        </address>
        
        <address>
            <strong>mail </strong><br>
            <a href="mailto:#">first.last@example.com</a>
        </address>
        <p>{{ $type }} since {{ $created_at }}</p>
    </div>
    @if( count($agents) )
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Nr.</th>
                            <th>E-Mail</th>
                            <th>Active</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($agents as $agent)
                        
                        <tr>
                            <td>{{  $agent['first_name']  }}</td>
                            <td>{{  $agent['last_name']  }}</td>
                            <td>{{ $agent['phone']  }}</td>
                            <td>{{ $agent['email']  }}</td>
                            <td>{{ $agent['active']  }}</td>
                            <td>{{ $agent['from_date']  }}</td>
                            <td>{{ $agent['to_date']  }}</td>
                            <td>
                                <a class="btn btn-default btn-xs" href="{{ action('AgentsController@edit',[$id,$agent['id']]) }}" role="button">edit</a>{{ $agent['to_date']  }}
                            </td>
                            <td>
                                <form action="{{ action('AgentsController@edit',[$id,$agent['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
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
    <div class="row">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a class="btn btn-default btn-block" role="button" href="{{ action('CompaniesController@index') }}" style="margin: 10px 0"> Back </a> 
        </div>
    </div>

@endsection