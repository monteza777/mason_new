@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lodges.title')</h3>
    
    {!! Form::model($lodge, ['method' => 'PUT', 'route' => ['admin.lodges.update', $lodge->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Lodge Name', trans('quickadmin.lodges.fields.lodge_name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('Lodge Address', trans('quickadmin.lodges.fields.lodge_address').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('Contact Number', trans('quickadmin.lodges.fields.lodge_contact_number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('contact_number', old('contact_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contact_number'))
                        <p class="help-block">
                            {{ $errors->first('contact_number') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('events.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop

