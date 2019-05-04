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

            
            <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                <label for="first_name" class="control-label">First Name <sup class="text-danger">*</sup></label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $first_name }}" title="">
            @if($errors->has('first_name'))
                <span class="help-block">{{ $errors->first('first_name') }}</span>
            @endif
            </div>

            
            <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                <label for="last_name" class="control-label">Last Name <sup class="text-danger">*</sup></label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $last_name }}" title="">
                @if($errors->has('last_name'))
                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('phone')) has-error @endif">
                <label for="phone" class="control-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $phone }}" title="">
                @if($errors->has('phone'))
                    <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group @if ($errors->has('mail')) has-error @endif">
                <label for="mail" class="control-label">E-Mail</label>
                <input type="text" name="mail" id="mail" class="form-control" value="{{ $email }}" title="">
                @if($errors->has('mail'))
                    <span class="help-block">{{ $errors->first('mail') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="active" id="input" value="1" @if($active) checked="checked" @endif>
                        <span>Active</span>
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="active" id="input" value="0" @if(!$active) checked="checked" @endif>
                        <span>Not Active</span>
                    </label>
                </div>            
            </div>
                
                
            <div class="form-inline">
                @foreach ($areaCodes as $areaInput)
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input name="area[]" type="checkbox" value="{{ $areaInput['id'] }}" @if($areaInput['checked']) checked="checked" @endif> <span>{{ $areaInput['name'] }}</span>
                            </label>
                        </div>
                    </div>    
                @endforeach
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

