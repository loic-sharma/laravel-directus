<div class="field">
	{{Form::label($name, directus_prettify($name), array('class'=>'primary'))}} <br>

	<div class="textarea_format clearfix">
		<ul>
			<li><a href="#" class="text_format_button" tabindex="-1" format="bold"><strong>Bold</strong></a></li> 
			<li><a href="#" class="text_format_button" tabindex="-1" format="italic"><em>Italic</em></a></li> 
			<li><a href="#" class="text_format_button" tabindex="-1" format="link">Link</a></li> 
			<li><a href="#" class="text_format_button" tabindex="-1" format="mail">Mail</a></li>
			<li><a href="#" class="text_format_button" tabindex="-1" format="image">Insert Image</a></li> 
			<li><a href="#" class="text_format_button" tabindex="-1" format="excerpt">Excerpt</a></li> 
			<li><a href="#" class="text_format_button" tabindex="-1" format="blockquote">Blockquote</a></li> 
		</ul>
	</div>

	<textarea class="textarea_formatted media_dropzone_target" parent_item="text_area_content" extensions="jpg,gif,png" media_type="inline" rows="8" id="text_area_content" name="content" class="">{{$value}}</textarea> 
</div>
