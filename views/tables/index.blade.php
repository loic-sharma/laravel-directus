<h2>Tables</h2>

<hr class="chubby">

<table id="tables_table" class="table" cellpadding="0" cellspacing="0" border="0" style="width:100%">
	<thead>
		<tr>
			<th class="icon"></th>
			<th class="first_field">Table</th>
			<th width="10%">Active Items</th>
		</tr>
	</thead>
	<tbody class="check_no_rows">
		@if(count($tables) == 0)
			<tr class="item no_rows"><td colspan="3">No tables available</td></tr>
		@else
			@foreach($tables as $name => $table)
				<tr onclick="location.href='{{URL::to('directus/table/' . $name)}}'">
					<td class="icon"><img src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" /></td>
					<td class="first_field"><div class="wrap">{{$table->name}}</div></td>
					<td class="text_right">{{$table->rows}}</td>
				</tr>
			@endforeach
		@endif
	</tbody>
</table>