<tr data-index="{{ $index }}">
	<td>
	{!! Form::select('district_lodges['.$index.'][grand_lodge_id]', $district_lodges,
		old('district_lodges['.$index.'][grand_lodge_id]', isset($field) ? $field->grand_lodge_id: ''), ['class' => 'form-control select2']) !!}
	</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>