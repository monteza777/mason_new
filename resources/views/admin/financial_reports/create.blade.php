@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.financial_reports.create')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.financial_reports.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('report_title', trans('quickadmin.financial_reports.fields.report_title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('report_title', old('report_title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('report_title'))
                        <p class="help-block">
                            {{ $errors->first('report_title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('report_content', trans('quickadmin.financial_reports.fields.report_content').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('report_content', old('report_content'), ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' => '',  'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('report_content'))
                        <p class="help-block">
                            {{ $errors->first('report_content') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('admin.financial_reports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop