<tr data-index="{{ $index }}">
    <td>{!! Form::text('lodges['.$index.'][lodge_name]', old('lodges['.$index.'][lodge_name]', isset($field) ? $field->lodge_name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('lodges['.$index.'][lodge_address]', old('lodges['.$index.'][lodge_address]', isset($field) ? $field->lodge_address: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>