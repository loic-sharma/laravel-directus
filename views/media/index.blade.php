<div id="hidden_vars" style="display:none;">
	<div id="cms_table">directus_media</div>
</div>
	
<div id="page_header" class="clearfix"> 
	<h2 class="col_8">Media</h2> 
	<a class="modal button big color right add_header" id="add_item_button" href="{{URL::to('directus/api/media_modal')}}">Add New Media</a>
</div> 

<hr class="chubby"> 

<div class="table_actions clearfix"> 
	<ul id="status_actions"> 
		<li id="status_action_delete"><a href="">Delete</a></li>
	</ul> 
			
	<select id="media_date_range"> 
		<option value="all">All time</option> 
		<option value="year">Past year</option>
		<option value="month">Past month</option> 
		<option value="week">Past week</option>  
	</select>
	
	<div id="live_filter_container"> 
		<label for="filter">Filter</label> 
	
		<input name="filter" id="media_filter" type="text"> 
	</div>
</div>

<table id="media_table" class="table actions" cellpadding="0" cellspacing="0" border="0" style="width:100%"> 
	<thead> 
		<tr> 
			<th class="check header"><!-- <input id="status_action_check_all" type="checkbox" name="" value=""> --></th> 
			<th class="thumb"></th> 
			<th class="field_title first_field header"><div class="wrap">Title<span class="ui-icon"></span></div></th> 
			<th width="10%" class="field_extension header"><div class="wrap">Type<span class="ui-icon"></span></div></th> 
			<th width="10%" class="field_size header"><div class="wrap">Size<span class="ui-icon"></span></div></th> 
			<th class="field_caption header"><div class="wrap">Caption<span class="ui-icon"></span></div></th> 
			<th width="10%" class="field_user header"><div class="wrap">User<span class="ui-icon"></span></div></th> 
			<th width="10%" class="field_date header headerSortUp"><div class="wrap">Uploaded<span class="ui-icon"></span></div></th> 
		</tr> 
	</thead> 
	<tbody class="check_no_rows media_dropzone_target" parent_item="" extensions="" media_type=""> 
		<tr class="media_item" id="media_2">
			<td class="check" raw="X"><input class="status_action_check" type="checkbox" name="media_ids_checked[]" value="2" id="2"></td> 
			<td class="thumb editable" raw="X">
				<input name="media_ids[]" type="hidden" value="2" />
				<div class="image_thumb viewport_image" src="./media/cms_thumbs/53d87c2375c979d94536fbf0640708d6.gif?2523" width="50" height="28">&nbsp;</div>
			</td> 
			<td class="field_title first_field editable"><div class="wrap">PHP</div></td> 
			<td class="field_type editable"><div class="wrap">GIF</div></td> 
			<td class="field_size editable"><div class="wrap">3 kB</div></td> 
			<td class="field_caption editable"><div class="wrap" title=""> <span class="hide"></span></div></td> 
			<td class="field_user editable"><div class="wrap"><strong>Loic</strong></div></td> 
			<td class="field_date editable"><div class="wrap" title="2012-06-01 03:44:17">5 days ago</div></td> 
		</tr>
		<tr class="media_item" id="media_1">
			<td class="check" raw="X"><input class="status_action_check" type="checkbox" name="media_ids_checked[]" value="1" id="1"></td> 
			<td class="thumb editable" raw="X">
			
				<input name="media_ids[]" type="hidden" value="1" />
				<div class="video_thumb">
					<img src="./media/cms_thumbs/youtube_tfnyX3-GPz8.jpg" width="50px" style="z-index:1;" />
					<span class="video_icon video_youtube"></span>
				</div>
			</td> 
			<td class="field_title first_field editable"><div class="wrap">VGHS Episode #3</div></td> 
			<td class="field_type editable"><div class="wrap">YOUTUBE</div></td> 
			<td class="field_size editable"><div class="wrap">09:22</div></td> 
			<td class="field_caption editable"><div class="wrap" title=",vghs,youtube,"> <span class="hide">,vghs,youtube,</span></div></td> 
			<td class="field_user editable"><div class="wrap"><strong>Loic</strong></div></td> 
			<td class="field_date editable"><div class="wrap" title="2012-06-01 00:12:40">5 days ago</div></td> 
		</tr>
		<tr class="item no_rows">
			<td colspan="8" raw="NULL">No media</td>
		</tr>
	</tbody> 
</table>