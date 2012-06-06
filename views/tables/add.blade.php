<h2>
	<a href="{{URL::to('directus/tables')}}">Tables</a> <span class="divider">/</span> 
	<a href="{{URL::to('directus/table/'.$table)}}">{{directus_prettify($table)}}</a> <span class="divider">/</span> Creating New Item
</h2>
	
<hr class="chubby"> 
	
<div class="clearfix" style="position: relative;"> 
	{{Form::open('directus/table/'.$table.'/add', 'POST', array('class' => 'edit_form', 'name' => 'edit_form'))}}
		<div id="edit_sidebar"> 
			<div id="sidebar_sticky"> 
				<div id="edit_actions" class="item_module"> 
					<div class="item_module_title"> 
						Item Status
					</div>
	
					<div class="item_module_box " style="overflow:visible;">
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
								</ul>
							</div>
						</div>

						<input id="save_and" name="save_and" type="hidden" value="return">
						<span> or <a class="cancel" href="{{URL::to('directus/table/'.$table)}}">Cancel</a></span> 
					</div> 
				</div> 
			</div> 
		</div> 

		<div id="edit_main"> 
			<div class="fieldset">
				@foreach($fields as $name => $field)
					{{Directus\Form::generate_field($name, null, $fields)}}
				@endforeach 
			</div>
		</div>
	</div>
</div>