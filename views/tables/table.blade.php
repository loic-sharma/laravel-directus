<div id="hidden_vars" style="display:none;">
	<div id="cms_table">{{$table->name}}</div>
	<div id="cms_table_id">0</div>
</div>

<div id="page_header" class="clearfix">
	<h2 class="col_8"><a href="{{URL::to('directus/tables')}}">Tables</a> <span class="divider">/</span> {{directus_prettify($table->name)}}</h2>
	<a id="add_item_button" class="button big color right add_header" href="{{URL::to('directus/table/'.$table->name.'/add')}}">Add New Item</a>
</div>

<hr class="chubby">

<table id="data-table" class="table">
	<thead>
		<tr>
			@foreach($table->fields as $name => $field)
				@if($name != 'id')
					<th>{{directus_prettify($name)}}</th>
				@endif
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($table->rows as $row)
			<tr {{$edit($table, $row)}}>
				@foreach($row as $field => $value)
					@if($field != 'id')
						<td>{{$transcribe($table->fields[$field], $value)}}</td>
					@endif
				@endforeach
			</tr>
		@endforeach
	</tbody>
</table>