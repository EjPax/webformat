@extends('layouts.app')

@section('title','Edit company')

@section('breadcrumbs')
    @parent
    <li>
        <a href="{{action('CompaniesController@index')}}">Companies</a>
    </li>
    <li>
        <a href="{{action('CompaniesController@show',$id)}}">{{$name}}</a>
    </li>
    <li class="active">Edit</li>
@endsection


@section('content')

    <form action="{{action('CompaniesController@update',$id)}}" method="POST" class="form-horizontal" role="form">
            @csrf

            @method('put')

            <div class="form-group">
                <legend>Edit company info</legend>
                <p><sup class="text-danger">*</sup> Required</p>
            </div>

            
            <div class="form-group @if ($errors->has('name')) has-error @endif">
                <label for="name" class="control-label col-lg-2">Name<sup class="text-danger">*</sup></label>
                <div class="col-lg-10">
                    <input type="text" name="name" id="name" class="form-control" value="{{$name}}" title="">
                    @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            
            <div class="form-group @if ($errors->has('type')) has-error @endif">
                <label for="type" class="control-label col-lg-2">Type<sup class="text-danger">*</sup></label>
                <div class="col-lg-10">
                    <select name="type" id="type" class="form-control">
                        <option value=""></option>
                        <option value="supplier" @if($type == 'supplier') selected="selected" @endif>Supplier</option>
                        <option value="customer" @if($type == 'customer') selected="selected" @endif>Customer</option>
                    </select>
                    @if($errors->has('type'))
                        <span class="help-block">{{ $errors->first('type') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="form-group @if ($errors->has('address')) has-error @endif">
                <label for="address" class="control-label col-lg-2">Address</label>
                <div class="col-lg-10">
                    <input type="text" name="address" id="address" class="form-control" value="{{ $address }}" title="">
                    @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="form-group @if ($errors->has('zip')) has-error @endif">
                <label for="zip" class="control-label col-lg-2">Zip</label>
                <div class="col-lg-10">
                    <input type="text" name="zip" id="zip" class="form-control" value="{{ $zip }}" title="">
                    @if($errors->has('zip'))
                        <span class="help-block">{{ $errors->first('zip') }}</span>
                    @endif
                </div>
            </div>
                
            <div class="form-group @if ($errors->has('city')) has-error @endif">
                <label for="city" class="control-label col-lg-2">City</label>
                <div class="col-lg-10">
                    <input type="text" name="city" id="city" class="form-control" value="{{ $city }}" title="">
                    @if($errors->has('city'))
                        <span class="help-block">{{ $errors->first('city') }}</span>
                    @endif
                </div>
            </div>
                    
            <div class="form-group @if ($errors->has('country')) has-error @endif">
                <label for="country" class="control-label col-lg-2">Country</label>
                <div class="col-lg-10">
                    <input type="text" name="country" id="country" class="form-control" value="{{ $country }}" title="">
                    @if($errors->has('country'))
                        <span class="help-block">{{ $errors->first('country') }}</span>
                    @endif
                </div>
            </div>
                    
            <div class="form-group @if ($errors->has('phone')) has-error @endif">
                <label for="phone" class="control-label col-lg-2">Phone</label>
                <div class="col-lg-10">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $phone }}" title="">
                    @if($errors->has('phone'))
                        <span class="help-block">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
    
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email" class="control-label col-lg-2">E-mail</label>
                <div class="col-lg-10">
                    <input type="text" name="email" id="email" class="form-control" value="{{ $email }}" title="">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
    
            <div class="form-group @if ($errors->has('website')) has-error @endif">
                <label for="website" class="control-label col-lg-2">Website</label>
                <div class="col-lg-10">
                    <input type="text" name="website" id="website" class="form-control" value="{{ $website }}" title="">
                    @if($errors->has('website'))
                        <span class="help-block">{{ $errors->first('website') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                
                <div class="row">
                
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <a class="btn btn-default btn-block" href="{{action('CompaniesController@show',$id)}}" role="button">Cancel</a>
                    </div>
                
                </div>
            
            </div>
    </form>
    
@endsection

