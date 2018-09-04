<tr data-index="{{ $index }}">
	<td>
	{!! Form::select('district_lodges['.$index.'][id]', $lodges,
		old('district_lodges['.$index.'][id]', isset($field) ? $field->id: ''), ['class' => 'form-control select2']) !!}
	</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>