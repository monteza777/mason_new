@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.financial_reports.create')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.financial_reports.fields.report_title')</th>
                            <td field-key='name'>{{ $reports->report_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.financial_reports.fields.report_content')</th>
                            <td field-key='email'>{!! $reports->report_content !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#d_lodges_actions" aria-controls="d_lodges_actions" role="tab" data-toggle="tab">Lodges</a></li>
</ul>

<!-- Tab panes -->
        <p>&nbsp;</p>
        <a href="{{ route('admin.financial_reports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        <form class="btn-group" action="{{ route('admin.financial_reports.submit', ['id' => $reports->id]) }}" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Submit to District</button>
        </form>
        </div>
    </div>
@stop
