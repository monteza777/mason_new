@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.district_lodges.title')</h3>
    @can('user_create')
    <p>
        <a href="{{ route('admin.district_lodges.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($lodges) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.lodges.fields.lodge_name')</th>
                        <th>@lang('quickadmin.lodges.fields.lodge_address')</th>
                        <th>@lang('quickadmin.lodges.fields.lodge_contact_number')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($lodges) > 0)
                        @foreach ($lodges as $lodge)
                            <tr data-entry-id="{{ $lodge->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $lodge->lodge_name }}</td>
                                <td field-key='email'>{{ $lodge->lodge_address }}</td>
                                <td field-key='role'>{{ $lodge->lodge_contact_number }}</td>
                                    <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.district_lodges.show',[$lodge->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.district_lodges.edit',[$lodge->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.district_lodges.destroy', $lodge->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop