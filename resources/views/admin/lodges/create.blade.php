@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lodges.create')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.lodges.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_name', trans('quickadmin.lodges.fields.lodge_name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_name', old('lodge_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_name'))
                        <p class="help-block">
                            {{ $errors->first('lodge_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_address', trans('quickadmin.lodges.fields.lodge_address').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_address', old('lodge_address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_address'))
                        <p class="help-block">
                            {{ $errors->first('lodge_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_contact_number', trans('quickadmin.lodges.fields.lodge_contact_number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_contact_number', old('lodge_contact_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_contact_number'))
                        <p class="help-block">
                            {{ $errors->first('lodge_contact_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_master', trans('quickadmin.lodges.fields.lodge_master').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_master', old('lodge_master'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_master'))
                        <p class="help-block">
                            {{ $errors->first('lodge_master') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_secretary', trans('quickadmin.lodges.fields.lodge_secretary').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_secretary', old('lodge_secretary'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_secretary'))
                        <p class="help-block">
                            {{ $errors->first('lodge_secretary') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('admin.lodges.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop
