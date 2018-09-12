@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lodges.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.lodges.fields.lodge_name')</th>
                            <td field-key='name'>{{ $lodge->lodge_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lodges.fields.lodge_address')</th>
                            <td field-key='email'>{{ $lodge->lodge_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lodges.fields.lodge_master')</th>
                            <td field-key='role'>{{ $lodge->lodge_master }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lodges.fields.lodge_secretary')</th>
                            <td field-key='role'>{{ $lodge->lodge_secretary }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lodges.fields.lodge_contact_number')</th>
                            <td field-key='role'>{{ $lodge->lodge_contact_number }}</td>
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
            <th>@lang('quickadmin.users.created')</th>
                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td>{{ $user->created_at}}</td>
                    <td field-key='d_user'>{{ $user->name}}</td>
                    <td field-key='action_model'>{{ $user->email }}</td>
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
	    <a href="{{ route('admin.lodges.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
	</div>
    </div>
@stop
