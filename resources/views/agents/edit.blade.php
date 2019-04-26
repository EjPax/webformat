@extends('layouts.app')

@section('content')
    @if($errors->count())
        <div class="alert alert-danger">
            <strong>Something were wrong!</strong>
            <p>please check for errors below</p>
        </div>
    @endif

    <form action="{{action('AgentsController@update',[$company_id,$id])}}" method="POST" class="form" role="form">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <legend>Add a new agent</legend>
            </div>

            
            <div class="form-group @if ($errors->has('agent_first_name')) has-error @endif">
                <label for="agent_first_name" class="control-label">First Name <sup class="text-danger">*</sup></label>
            <input type="text" name="agent_first_name" id="agent_first_name" class="form-control" value="{{ $first_name }}" title="">
            @if($errors->has('agent_first_name'))
                <span class="help-block">{{ $errors->first('agent_first_name') }}</span>
            @endif
            </div>

            
            <div class="form-group @if ($errors->has('agent_last_name')) has-error @endif">
                <label for="agent_last_name" class="control-label">Last Name <sup class="text-danger">*</sup></label>
                <input type="text" name="agent_last_name" id="agent_last_name" class="form-control" value="{{ $last_name }}" title="">
                @if($errors->has('agent_last_name'))
                    <span class="help-block">{{ $errors->first('agent_last_name') }}</span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('agent_phone')) has-error @endif">
                <label for="agent_phone" class="control-label">Phone</label>
                <input type="text" name="agent_phone" id="agent_phone" class="form-control" value="{{ $phone }}" title="">
                @if($errors->has('agent_phone'))
                    <span class="help-block">{{ $errors->first('agent_phone') }}</span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('agent_mail')) has-error @endif">
                <label for="agent_mail" class="control-label">E-Mail</label>
                <input type="text" name="agent_mail" id="agent_mail" class="form-control" value="{{ $email }}" title="">
                @if($errors->has('agent_mail'))
                    <span class="help-block">{{ $errors->first('agent_mail') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="agent_active" id="input" value="1" @if($active) checked="checked" @endif>
                        <span>Active</span>
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="agent_active" id="input" value="0" @if(!$active) checked="checked" @endif>
                        <span>Not Active</span>
                    </label>
                </div>            
            </div>
                
                
            <div class="form-group @if ($errors->has('company_type')) has-error @endif">
                <label for="company_type" class="control-label">Type:</label>
                <select name="company_type" id="company_type" class="form-control">
                    <option value=""></option>
                    <option value="supplier" @if(old('company_type') == 'supplier') selected="selected" @endif>Supplier</option>
                    <option value="customer" @if(old('company_type') == 'customer') selected="selected" @endif>Customer</option>
                </select>
            
                @if($errors->has('company_type'))
                    <span class="help-block">{{ $errors->first('company_type') }}</span>
                @endif
            </div>
            
            

            <div class="form-group">
                <div class="row">
                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <a class="btn btn-default btn-block" href="{{action('CompaniesController@show',$company_id)}}" role="button">Cancel</a>
                    </div>
                </div>
                
            </div>
    </form>
    
@endsection

