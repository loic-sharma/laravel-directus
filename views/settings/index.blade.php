<h2>Settings</h2>

<hr class="chubby">

<div class="clearfix" style="position:relative;">
	
	<form id="cms_settings" name="cms_settings" action="settings.php" method="post">
		
		<div id="settings_general">
			
			<div class="box">
				<div class="pad_bottom"> 
					<label class="primary" for="site_name">Site Name</label><br> 
					<input class="settings_general" type="text" name="cms[site_name]" maxlength="255" value="Blog"> 
				</div>
				<div class="pad_bottom"> 
					<label class="primary" for="site_url">Site URL</label><br> 
					<input class="settings_general" type="text" name="cms[site_url]" maxlength="255" value="{{URL::base()}}" readonly="readonly"> 
				</div>
				<div class="pad_bottom"> 
					<label class="primary" for="color">CMS Color</label>
					<select name="cms[cms_color]">
						<option value="blue"  >Blue</option><option value="green" selected="selected" >Green</option><option value="orange"  >Orange</option><option value="pink"  >Pink</option><option value="purple"  >Purple</option><option value="red"  >Red</option>					</select> 
				</div>
			</div>
			<div class="box">
				<div class="pad_bottom">
					<label class="primary" for="media_folder">Media Folder</label><br>
					<input class="settings_general" type="text" name="cms[media_path]" maxlength="255" value="media/files/">
				</div>
				<div class="pad_bottom">
					<label class="primary">Media Naming</label><br>
					<input id="media_random" type="radio" name="cms[media_naming]" value="unique" checked="checked" > <label for="media_random">Unique</label>
					<span class="instruct block small"><em>Generates unique filename</em></span>
					<input id="media_sequential" type="radio" name="cms[media_naming]" value="sequential"  > <label for="media_sequential">Sequential</label>
					<span class="instruct block small"><em>Padded number e.g. 00001, 00002</em></span>
					<input id="media_original" type="radio" name="cms[media_naming]" value="original"  > <label for="media_original">Original filename</label>
					<span class="instruct block small"><em>File names will be cleaned, duplicate names are safe</em></span>
				</div>
				<div class="pad_bottom">
					<label class="primary">Thumbnail Quality</label><br>
					<input id="thumb_quality" class="small force_numeric" maxlength="3" size="3" type="text" name="cms[thumb_quality]" value="100"> <label for="thumb_quality">%</label>
					<br><br>
					<label class="primary">Allowed Thumbnails</label><br>
					<div class="clearfix">
						<label>Width</label> <input id="thumb_width" type="text" size="4" class="small force_numeric" maxlength="4" name="thumb_width" value=""> <label>Height</label> <input id="thumb_height" type="text" class="small force_numeric" maxlength="4" size="4" name="thumb_height" value=""> <input id="thumb_crop" type="checkbox" name="thumb_crop"> <label for="thumb_crop">Crop?</label> <input id="thumb_add" class="button pill" type="button" value="Add">
					</div>
				</div>
				<div>
					<ul id="cms_media_thumbs" class="check_no_rows">
												<li class="item no_rows">No automatic thumbnails</li>
					</ul>
				</div>
			</div>
			<div class="box">
				<a href="#" id="settings_extended_details">View Server Details</a>
			</div>
			<input class="button color big now_activity" activity="saving" type="submit" value="Update Settings" name="submit"> <span>or <a class="cancel" href="#">Cancel</a></span>			
		</div>
		
		<div id="settings_tables">
							
				<div class="item_module toggle closed" id="settings_open_table_comments">
					<div class="item_module_title toggle">
						<div class="title">
							<img class="table_settings_icon" src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" />
							<span class="table_settings_title">Comments</span>
							<span class="item_module_toggle ui-icon down"></span>
						</div>
					</div>
					<div class="item_module_box">
						<div class="table_options">
							<input type="checkbox" name="table_hidden[]" value="comments"  ><label class="normal" style="margin-right:0.5em;">Hidden</label>
							<input type="checkbox" name="table_single[]" value="comments"  ><label class="normal" style="margin-right:0.5em;">Single</label>
							<input type="checkbox" name="table_inactive_default[]" value="comments"  ><label class="normal" style="margin-right:0.5em;">Inactive by default</label>
						</div>
						<table class="field_options">
							<thead>
								<tr>
									<th style="width:130px;">Field</th>
									<th style="width:220px;">Options</th>
									<th class="text_center" style="width:50px;">Required</th>
									<th class="text_center" style="width:50px;">Hidden</th>
									<th class="text_center" style="width:50px;">Primary</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
								
																	<tr>
										<td><div class="wrap" title="int">Post ID</div></td>
										<td>
											<select class="datatype_options" name="field_format[comments,post_id]" tablefield="comments,post_id">
												<option value="numeric"  >Numeric</option><option value="dropdown_int"  >Dropdown Int</option><option value="rating"  >Rating</option><option value="histogram"  >Histogram</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[comments,post_id]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[comments,post_id]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[comments]" value="post_id" checked="checked" ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[comments,post_id]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="text">Content</div></td>
										<td>
											<select class="datatype_options" name="field_format[comments,content]" tablefield="comments,content">
												<option value="text_area"  >Text Area</option><option value="table_view"  >Table View (Beta)</option><option value="text_field"  >Text Field</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[comments,content]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[comments,content]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[comments]" value="content"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[comments,content]" value=""></td>
									</tr>
																	
							</tbody>
						</table>
					</div>
				</div>
				
								
				<div class="item_module toggle closed" id="settings_open_table_demo_table">
					<div class="item_module_title toggle">
						<div class="title">
							<img class="table_settings_icon" src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" />
							<span class="table_settings_title">Demo Table</span>
							<span class="item_module_toggle ui-icon down"></span>
						</div>
					</div>
					<div class="item_module_box">
						<div class="table_options">
							<input type="checkbox" name="table_hidden[]" value="demo_table"  ><label class="normal" style="margin-right:0.5em;">Hidden</label>
							<input type="checkbox" name="table_single[]" value="demo_table"  ><label class="normal" style="margin-right:0.5em;">Single</label>
							<input type="checkbox" name="table_inactive_default[]" value="demo_table"  ><label class="normal" style="margin-right:0.5em;">Inactive by default</label>
						</div>
						<table class="field_options">
							<thead>
								<tr>
									<th style="width:130px;">Field</th>
									<th style="width:220px;">Options</th>
									<th class="text_center" style="width:50px;">Required</th>
									<th class="text_center" style="width:50px;">Hidden</th>
									<th class="text_center" style="width:50px;">Primary</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
								
																	<tr>
										<td><div class="wrap" title="varchar">Text Field</div></td>
										<td>
											<select class="datatype_options" name="field_format[demo_table,text_field]" tablefield="demo_table,text_field">
												<option value="text_field"  >Text Field</option><option value="text_area"  >Text Area</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option><option value="email"  >Email</option><option value="short_name"  >Short Name</option><option value="password"  >Password</option><option value="numeric"  >Numeric</option><option value="color"  >Color</option><option value="rating"  >Rating</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[demo_table,text_field]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[demo_table,text_field]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[demo_table]" value="text_field" checked="checked" ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[demo_table,text_field]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="text">Text</div></td>
										<td>
											<select class="datatype_options" name="field_format[demo_table,text]" tablefield="demo_table,text">
												<option value="text_area"  >Text Area</option><option value="table_view"  >Table View (Beta)</option><option value="text_field"  >Text Field</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[demo_table,text]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[demo_table,text]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[demo_table]" value="text"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[demo_table,text]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="tinyint">Checkbox</div></td>
										<td>
											<select class="datatype_options" name="field_format[demo_table,checkbox]" tablefield="demo_table,checkbox">
												<option value="checkbox"  >Checkbox</option><option value="numeric"  >Numeric</option><option value="dropdown_int"  >Dropdown Int</option><option value="rating"  >Rating</option><option value="histogram"  >Histogram</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[demo_table,checkbox]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[demo_table,checkbox]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[demo_table]" value="checkbox"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[demo_table,checkbox]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="date">Date</div></td>
										<td>
											<select class="datatype_options" name="field_format[demo_table,date]" tablefield="demo_table,date">
												<option value="date_chooser"  >Date Chooser</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[demo_table,date]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[demo_table,date]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[demo_table]" value="date"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[demo_table,date]" value=""></td>
									</tr>
																	
							</tbody>
						</table>
					</div>
				</div>
				
								
				<div class="item_module toggle closed" id="settings_open_table_posts">
					<div class="item_module_title toggle">
						<div class="title">
							<img class="table_settings_icon" src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" />
							<span class="table_settings_title">Posts</span>
							<span class="item_module_toggle ui-icon down"></span>
						</div>
					</div>
					<div class="item_module_box">
						<div class="table_options">
							<input type="checkbox" name="table_hidden[]" value="posts"  ><label class="normal" style="margin-right:0.5em;">Hidden</label>
							<input type="checkbox" name="table_single[]" value="posts"  ><label class="normal" style="margin-right:0.5em;">Single</label>
							<input type="checkbox" name="table_inactive_default[]" value="posts"  ><label class="normal" style="margin-right:0.5em;">Inactive by default</label>
						</div>
						<table class="field_options">
							<thead>
								<tr>
									<th style="width:130px;">Field</th>
									<th style="width:220px;">Options</th>
									<th class="text_center" style="width:50px;">Required</th>
									<th class="text_center" style="width:50px;">Hidden</th>
									<th class="text_center" style="width:50px;">Primary</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
								
																	<tr>
										<td><div class="wrap" title="int">User ID</div></td>
										<td>
											<select class="datatype_options" name="field_format[posts,user_id]" tablefield="posts,user_id">
												<option value="numeric"  >Numeric</option><option value="dropdown_int"  >Dropdown Int</option><option value="rating"  >Rating</option><option value="histogram"  >Histogram</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[posts,user_id]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[posts,user_id]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[posts]" value="user_id" checked="checked" ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[posts,user_id]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="varchar">Title</div></td>
										<td>
											<select class="datatype_options" name="field_format[posts,title]" tablefield="posts,title">
												<option value="text_field"  >Text Field</option><option value="text_area"  >Text Area</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option><option value="email"  >Email</option><option value="short_name"  >Short Name</option><option value="password"  >Password</option><option value="numeric"  >Numeric</option><option value="color"  >Color</option><option value="rating"  >Rating</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[posts,title]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[posts,title]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[posts]" value="title"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[posts,title]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="text">Body</div></td>
										<td>
											<select class="datatype_options" name="field_format[posts,body]" tablefield="posts,body">
												<option value="text_area"  >Text Area</option><option value="table_view"  >Table View (Beta)</option><option value="text_field"  >Text Field</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[posts,body]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[posts,body]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[posts]" value="body"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[posts,body]" value=""></td>
									</tr>
																	
							</tbody>
						</table>
					</div>
				</div>
				
								
				<div class="item_module toggle closed" id="settings_open_table_table">
					<div class="item_module_title toggle">
						<div class="title">
							<img class="table_settings_icon" src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" />
							<span class="table_settings_title">Table</span>
							<span class="item_module_toggle ui-icon down"></span>
						</div>
					</div>
					<div class="item_module_box">
						<div class="table_options">
							<input type="checkbox" name="table_hidden[]" value="table"  ><label class="normal" style="margin-right:0.5em;">Hidden</label>
							<input type="checkbox" name="table_single[]" value="table"  ><label class="normal" style="margin-right:0.5em;">Single</label>
							<input type="checkbox" name="table_inactive_default[]" value="table"  ><label class="normal" style="margin-right:0.5em;">Inactive by default</label>
						</div>
						<table class="field_options">
							<thead>
								<tr>
									<th style="width:130px;">Field</th>
									<th style="width:220px;">Options</th>
									<th class="text_center" style="width:50px;">Required</th>
									<th class="text_center" style="width:50px;">Hidden</th>
									<th class="text_center" style="width:50px;">Primary</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
								
																	<tr>
										<td><div class="wrap" title="varchar">Title</div></td>
										<td>
											<select class="datatype_options" name="field_format[table,title]" tablefield="table,title">
												<option value="text_field"  >Text Field</option><option value="text_area"  >Text Area</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option><option value="email"  >Email</option><option value="short_name"  >Short Name</option><option value="password"  >Password</option><option value="numeric"  >Numeric</option><option value="color"  >Color</option><option value="rating"  >Rating</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[table,title]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[table,title]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[table]" value="title" checked="checked" ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[table,title]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="text">Content</div></td>
										<td>
											<select class="datatype_options" name="field_format[table,content]" tablefield="table,content">
												<option value="text_area"  >Text Area</option><option value="table_view"  >Table View (Beta)</option><option value="text_field"  >Text Field</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[table,content]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[table,content]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[table]" value="content"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[table,content]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="int">Author</div></td>
										<td>
											<select class="datatype_options" name="field_format[table,author]" tablefield="table,author">
												<option value="numeric"  >Numeric</option><option value="dropdown_int"  >Dropdown Int</option><option value="rating"  >Rating</option><option value="histogram"  >Histogram</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[table,author]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[table,author]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[table]" value="author"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[table,author]" value=""></td>
									</tr>
																	
							</tbody>
						</table>
					</div>
				</div>
				
								
				<div class="item_module toggle closed" id="settings_open_table_users">
					<div class="item_module_title toggle">
						<div class="title">
							<img class="table_settings_icon" src="{{URL::to_asset('bundles/directus/img/icons/database.png')}}" width="16" height="16" />
							<span class="table_settings_title">Users</span>
							<span class="item_module_toggle ui-icon down"></span>
						</div>
					</div>
					<div class="item_module_box">
						<div class="table_options">
							<input type="checkbox" name="table_hidden[]" value="users"  ><label class="normal" style="margin-right:0.5em;">Hidden</label>
							<input type="checkbox" name="table_single[]" value="users"  ><label class="normal" style="margin-right:0.5em;">Single</label>
							<input type="checkbox" name="table_inactive_default[]" value="users"  ><label class="normal" style="margin-right:0.5em;">Inactive by default</label>
						</div>
						<table class="field_options">
							<thead>
								<tr>
									<th style="width:130px;">Field</th>
									<th style="width:220px;">Options</th>
									<th class="text_center" style="width:50px;">Required</th>
									<th class="text_center" style="width:50px;">Hidden</th>
									<th class="text_center" style="width:50px;">Primary</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
								
																	<tr>
										<td><div class="wrap" title="varchar">Username</div></td>
										<td>
											<select class="datatype_options" name="field_format[users,username]" tablefield="users,username">
												<option value="text_field"  >Text Field</option><option value="text_area"  >Text Area</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option><option value="email"  >Email</option><option value="short_name"  >Short Name</option><option value="password"  >Password</option><option value="numeric"  >Numeric</option><option value="color"  >Color</option><option value="rating"  >Rating</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[users,username]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[users,username]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[users]" value="username" checked="checked" ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[users,username]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="varchar">Password</div></td>
										<td>
											<select class="datatype_options" name="field_format[users,password]" tablefield="users,password">
												<option value="text_field"  >Text Field</option><option value="text_area"  >Text Area</option><option value="media"  >Media</option><option value="relational"  >Relational</option><option value="options"  >Options</option><option value="tags"  >Tags</option><option value="email"  >Email</option><option value="short_name"  >Short Name</option><option value="password"  >Password</option><option value="numeric"  >Numeric</option><option value="color"  >Color</option><option value="rating"  >Rating</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[users,password]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[users,password]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[users]" value="password"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[users,password]" value=""></td>
									</tr>
																		<tr>
										<td><div class="wrap" title="int">Admin</div></td>
										<td>
											<select class="datatype_options" name="field_format[users,admin]" tablefield="users,admin">
												<option value="numeric"  >Numeric</option><option value="dropdown_int"  >Dropdown Int</option><option value="rating"  >Rating</option><option value="histogram"  >Histogram</option>											</select>
											<a id="" class="datatype_more_options" href="#">more options</a>
											<div class="options_container"></div>
										</td>
										<td class="text_center"><input title="Required" type="checkbox" name="field_required[users,admin]" value="true"  ></td>
										<td class="text_center"><input title="Hidden" type="checkbox" name="field_hidden[users,admin]" value="true"  ></td>
										<td class="text_center"><input title="Primary" type="radio" name="field_primary[users]" value="admin"  ></td>
										<td><input type="text" class="field_note" maxlength="255" name="field_note[users,admin]" value=""></td>
									</tr>
																	
							</tbody>
						</table>
					</div>
				</div>
				
						</div>
	</form>
</div>