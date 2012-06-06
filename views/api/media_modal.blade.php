<div class="fog"></div>

<div class="modal_window" style="display:none;">
	<div class="modal_window_header" class="clearfix">
		Add New Media
		<a class="close_modal" href=""></a>
	</div>

	<form enctype="multipart/form-data" id="upload_form" target="iframe" action="{{URL::to('directus/api/media_upload')}}" method="post" name="upload_media_form">
		<div class="modal_window_content media_modal_window_content"> 	
			<div class="media_modal_options clearfix">
				<ul>
					<li><a class="media_modal_type_change current" area="upload" href="#">Upload from Computer</a></li>
					<li><a class="media_modal_type_change" area="url" href="#">Add from URL</a></li>
					<li><a class="media_modal_type_change" area="video" href="#">Link to Video</a></li>
				</ul>
			</div>

			<div class="fieldset" id="media_modal_area_add"> 	
				<div class="field" id="upload_media_pane" > 
					<div id="media_modal_area_upload" style="position:relative;"> 
						<label for="" title="2M/8M">Upload file from computer</label>

						<div style="height:30px;">&nbsp;</div>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
						<input class="short" name="upload_media[]" type="file" multiple="multiple" style="position:absolute; bottom:0px; padding-bottom:6px; left:0px; width:100%; height:14px; z-index:2;" id="upload_media_input"> 
						<div id="upload_media_dropzone" style="position:absolute; bottom:0px; right:0px; width:700px; height:16px; padding:6px 6px 6px 6px; background-color:#dcdcdc; color:#484848; z-index:1; text-align:right; display:none;">
							Try Dropping files here
						</div>
					</div> 
					<div id="media_modal_area_url" style="display:none;"> 
						<label for="">Add from URL</label><br> 

						<input class="short" name="url_media" type="text" value="http://"> 
						<div class="instruct">
							Path to image on another site or a URL from video sites like YouTube or Vimeo.<br> 
							(ie. http://www.youtube.com/watch?v=txqiwrbYGrs)
						</div>
					</div>
				</div> 

				<div class="field"> 
					<label class="primary">Title</label><br> 

					<input class="text" name="title" type="text" value="">
				</div>

				<div class="field"> 
					<label class="primary">Location</label><br> 

					<input class="text" name="location" type="text" value="">
				</div>

				<div class="field"> 
					<label class="primary">Caption</label><br> 

					<textarea rows="8" name="caption"></textarea> 
				</div>

				<div class="field"> 
					<label class="primary">Tags</label> <br> 

					<input id="input_modal_tags" class="short_half tag_input tag_autocomplete" type="text"> <input tabindex="-1" field="modal_tags" id="tags" class="tag_add button pill" type="button" value="Add"> 
					<input id="hidden_modal_tags" type="hidden" name="tags" value="" class=""> 
					<div id="tags_modal_tags" class="tags_list clearfix"> 
											</div> 
				</div>				
			</div>	
		</div> 

		<div class="modal_window_actions">
			<div class="pad_full_small">
				<input class="button big color now_activity" activity="uploading" type="submit" value="Save Media"> 
				<span>or <a class="cancel cancel_modal" href="browse.php?table=">Cancel</a></span>
			</div>
		</div>
	</form>
</div>