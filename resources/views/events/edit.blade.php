@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>
    
    {!! Form::model($event, ['method' => 'PUT', 'route' => ['events.update', $event->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Title', trans('quickadmin.events.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message', trans('quickadmin.events.fields.message').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('message', old('message'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('message'))
                        <p class="help-block">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start', trans('quickadmin.events.fields.start').'*', ['class' => 'control-label']) !!}<br>
                    {!! Form::input('dateTime-local','event_start', $date_start, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                    <p class="help-block"></p>
                    @if($errors->has('event_start'))
                        <p class="help-block">
                            {{ $errors->first('event_start') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('event_end', trans('quickadmin.events.fields.end').'*', ['class' => 'control-label']) !!}<br>
                    {!! Form::input('dateTime-local','event_end', $date_end, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('event_end'))
                        <p class="help-block">
                            {{ $errors->first('event_end') }}
                        </p>
                    @endif
                    {{-- {{ Carbon\Carbon::parse($event->created_at)->format('d.m.Y H:i') }}  --}}
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('events.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop

