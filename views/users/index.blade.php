<div id="page_header" class="clearfix"> 
	<h2 class="col_8">Users</h2> 
	<a id="add_item_button" class="button color big right add_header" href="user_settings.php">Add New User</a>
</div> 

<hr class="chubby">
		
<table id="users_table" class="table" cellpadding="0" cellspacing="0" border="0" style="width:100%"> 
	<thead> 
		<tr> 
			<th class="icon"></th> 
			<th class="first_field">Name</th> 
			<th>Last Activity</th> 
			<th>Email</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody>
		@foreach($users as $user)
			<tr>
				<td class="icon"><img src="http://www.gravatar.com/avatar/{{$user->gravatar_hash}}?d=identicon&s=50" width="25" height="25"></td> 
				<td class="first_field"><div class="wrap"><strong>{{$user->name}}</strong><a class="badge edit_user" href="user_settings.php?u=1" style="display:none;">Edit</a></div></td> 
				<td><div class="wrap">
					@if(empty($user->activity))
						None
					@else
						{{$user->updated_at}} on the <a href="{{URL::to('directus/'.strtolower($user->activity))}}">{{$user->activity}} page</a>
					@endif</div></td> 
				<td><div class="wrap"><a href="mailto:{{$user->email}}">{{$user->email}}</a></div></td> 
				<td><div class="wrap">{{$user->description}}</div></td>
			</tr> 
		@endforeach 
	</tbody> 
</table>