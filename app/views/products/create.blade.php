@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Product</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'products.store', 'class' => 'form-horizontal')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('price', Input::old('price'), array('class'=>'form-control', 'placeholder'=>'Price')) }}
        </div>
    </div>
    
    <div class="form-group">
        {{ Form::label('description', 'Description:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control', 'placeholder'=>'Description')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('category_id', 'Category:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('category_id', Category::lists('name'), Input::old('category_id'), array('class'=>'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('discontinued', 'Discontinued:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::checkbox('discontinued') }}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
          {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
        </div>
    </div>

{{ Form::close() }}

@stop


