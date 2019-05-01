@extends('layouts.app')

@section('title','Add new agent')

@section('breadcrumbs')
    @parent
    <li>
        <a href="{{action('CompaniesController@index')}}">Companies</a>
    </li>
    <li class="active">Add new agent</li>
@endsection

@section('content')
    <div class="row">

        <form action="{{action('AgentsController@store',[$parentId])}}" method="POST" class="form" role="form">
            @csrf
            
            <div class="form-group">
                <legend>Add a new agent</legend>
                <p>with this form you can add a new agent.</p>
            </div>
            
            
            <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                <label for="first_name" class="control-label">First Name <sup class="text-danger">*</sup></label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" title="">
                @if($errors->has('first_name'))
                <span class="help-block">{{ $errors->first('first_name') }}</span>
                @endif
            </div>


            <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                <label for="last_name" class="control-label">Last Name <sup class="text-danger">*</sup></label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" title="">
                @if($errors->has('last_name'))
                <span class="help-block">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            
            <div class="form-group @if ($errors->has('phone')) has-error @endif">
                <label for="phone" class="control-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" title="">
                @if($errors->has('phone'))
                <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email" class="control-label">E-Mail</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" title="">
                @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="active" id="input" value="1" checked="checked">
                        <span>Active</span>
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="active" id="input" value="0">
                        <span>Not Active</span>
                    </label>
                </div>            
            </div>
            
            <div class="form-group">
                <div class="row">
                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <a class="btn btn-default btn-block" href="{{action('CompaniesController@show',$parentId)}}" role="button">Cancel</a>
                    </div>
                </div>
                
            </div>

        </form>
        
    </div>
@endsection
                        
                        