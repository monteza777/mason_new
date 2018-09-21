@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.financial_reports.create')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.financial_reports.fields.lodge_name')</th>
                            <td field-key='name'>{{ $reports->report_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.financial_reports.fields.lodge_address')</th>
                            <td field-key='email'>{{ $reports->report_content }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#d_lodges_actions" aria-controls="d_lodges_actions" role="tab" data-toggle="tab">Lodges</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="d_lodges">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>@lang('quickadmin.financial_reports.created_at')</th>
                        <th>@lang('quickadmin.financial_reports.fields.report_title')</th>
                        <th>@lang('quickadmin.financial_reports.fields.report_content')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($reports) > 0)
            @foreach ($reports as $report)
                <tr data-entry-id="{{ $report->id }}">
                    <td>{{ $report->created_at}}</td>
                                <td field-key='d_report'>{{ $report->report_title}}</td>
                                <td field-key='action_model'>{{ $report->report_content }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.financial_reports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
