@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.district_lodges.create')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.district_lodges.fields.lodge_name')</th>
                            <td field-key='name'>{{ $d_lodges->lodge_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.district_lodges.fields.lodge_address')</th>
                            <td field-key='email'>{{ $d_lodges->lodge_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.district_lodges.fields.lodge_master')</th>
                            <td field-key='role'>{{ $d_lodges->lodge_master }}</td>
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
            <th>@lang('quickadmin.district_lodges.created_at')</th>
                        <th>@lang('quickadmin.district_lodges.fields.lodge_name')</th>
                        <th>@lang('quickadmin.district_lodges.fields.lodge_address')</th>
                        <th>@lang('quickadmin.district_lodges.fields.lodge_master')</th>
                        <th>@lang('quickadmin.district_lodges.fields.lodge_contact_number')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($lodge) > 0)
            @foreach ($lodge as $lodges)
                <tr data-entry-id="{{ $lodges->id }}">
                    <td>{{ $lodges->created_at}}</td>
                                <td field-key='d_lodges'>{{ $lodges->lodge_name}}</td>
                                <td field-key='action_model'>{{ $lodges->lodge_address }}</td>
                                <td field-key='action'>{{ $lodges->lodge_master }}</td>
                                <td field-key='action_id'>{{ $lodges->lodge_contact_number }}</td>
                                
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

            <a href="{{ route('admin.district_lodges.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
