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
                            <th>@lang('quickadmin.lodges.fields.lodge_contact_number')</th>
                            <td field-key='role'>{{ $lodge->contact_number }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->


<!-- Tab panes -->
	    <p>&nbsp;</p>
	    <a href="{{ route('admin.lodges.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
	</div>
    </div>
@stop
