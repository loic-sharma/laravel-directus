<h2>
	<a href="{{URL::to('directus/tables')}}">Tables</a> <span class="divider">/</span> 
	<a href="{{URL::to('directus/table/'.$table)}}">{{directus_prettify($table)}}</a> <span class="divider">/</span> Editing Item
</h2> 

<hr class="chubby"> 
	
<div class="clearfix" style="position: relative;"> 
	{{Form::open('directus/table/'.$table.'/edit/'.$row->id, 'POST', array('class' => 'edit_form', 'name' => 'edit_form'))}}
		<div id="edit_sidebar"> 
			<div id="sidebar_sticky"> 
				<div id="edit_actions" class="item_module"> 
					<div class="item_module_title"> 
						Item Status
					</div>
					<div class="item_module_box section" style="overflow:visible;">
						<div id="save_actions">
							<div id="save_button">
								<a save_and="return" class="edit_save_button now_activity" activity="saving" href="#">Save Item</a>
							</div>
							<div id="save_toggle">
								<span class="ui-icon white ui-icon-triangle-1-s"></span>
							</div>
							<div id="save_options">
								<ul>
									<li><a save_and="stay" class="edit_save_button now_activity" activity="saving" href="#">Save &amp; Stay</a></li>
									<li><a save_and="add" class="edit_save_button now_activity" activity="saving" href="#">Save &amp; Add</a></li>
									<li><a save_and="duplicate" class="edit_save_button now_activity" activity="saving" href="#">Save as Copy</a></li>
									<li><a save_and="delete" class="edit_save_button delete now_activity" activity="saving" href="#">Delete</a></li>
								</ul>
							</div>
						</div>
						<input id="save_and" name="save_and" type="hidden" value="return">
						<span> or <a class="cancel" href="{{URL::to('directus/table/'.$table)}}">Cancel</a></span> 
					</div> 
				</div> 
					
					
				<div id="edit_revisions" class="item_module toggle closed"> 
					<div class="item_module_title toggle"> 
						<div class="title">Item Revisions ({{count($logs)}})<span class="item_module_toggle ui-icon down"></span></div> 
						</div> 
						<div class="item_module_box"> 
							<ul id="item_revisions" class="item_module_list">
								@if(count($logs) == 0)
									No revisions
								@else
									@foreach($logs as $log)
										<li>
											<div class="{{$log->type}}">
												<a class="revert item" href="#" confirm_href="edit.php?table=posts&item=1&revision=9" title="date thingie">{{ucfirst($log->type)}} {{$log->time_ago}}</a>
												<span class="username">by {{$log->user->first_name}}</span>
											</div>
										</li>
									@endforeach
								@endif
							</ul> 
						</div>
					</div>
					<div id="edit_messaging" class="item_module toggle closed">
						<div class="item_module_title toggle"> 
							<div class="title">Item Messages (<span id="item_message_count">{{count($messages)}}</span>) <span class="item_module_toggle ui-icon down"></span></div> 
						</div>
						<div class="item_module_box section">
								
						<!-- <form id="item_messaging" name="item_messaging" action="" method="post"> -->
							<label for="item_message" class="primary">Leave a message for this item</label><br>
							<textarea id="item_message" name="item_message" class="small" rows="4"></textarea>
							<input id="item_message_send" class="button pill" type="button" name="Send" value="Send" table="{{$table}}" row="{{$row->id}}">
								
						</div>
						<div class="item_module_box">
							<ul id="item_messages">
								@if(count($messages) == 0)
									<span id="no_item_messages">No messages</span>
								@else
									@foreach($messages as $message)
										<li>
											<span class="item_message_user"><b>{{$message->user->first_name}}</b> wrote:</span>
											{{$message->content}}
											<span class="item_message_date">{{$message->time_ago}}</span>
										</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>						
				</div>
			</div> 
			<div id="edit_main"> 
				<div class="fieldset">
					@foreach($row as $field => $value)
						{{Directus\Form::generate_field($field, $value, $fields)}}
					@endforeach
				</div>
			</div>
		</div>
	{{Form::close()}}
</div>