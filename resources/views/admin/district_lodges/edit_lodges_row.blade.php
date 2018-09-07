<tr data-index="{{ $index }}">
	<td>
	{!! Form::select('lodges['.$index.'][id]', $c_lodges,
		old('lodges['.$index.'][id]', isset($field) ? $field->id: ''), ['class' => 'form-control select2']) !!}
	</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>