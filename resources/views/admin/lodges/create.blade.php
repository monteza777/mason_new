@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lodges.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.lodges.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lodge_name', trans('quickadmin.lodges.fields.lodge_name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('lodge_address', trans('quickadmin.lodges.fields.lodge_address').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('lodge_contact_number', trans('quickadmin.lodges.fields.lodge_contact_number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lodge_contact_number', old('lodge_contact_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lodge_contact_number'))
                        <p class="help-block">
                            {{ $errors->first('lodge_contact_number') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    
        <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="users">
                    @foreach(old('users', []) as $index => $data)
                        @include('admin.lodges.lodge_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('admin.lodges.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="users-template">
        @include('admin.lodges.lodge_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop