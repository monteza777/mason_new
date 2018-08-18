@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.events.fields.title')</th>
                            <td field-key='name'>{{ $event->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.message')</th>
                            <td field-key='email'>{{ $event->message }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.start')</th>
                            <td field-key='role'>{{ $event->event_start}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.end')</th>
                            <td field-key='role'>{{ $event->event_end}}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <p>&nbsp;</p>
    <a href="{{ route('events.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
	</div>
</div>
@stop
