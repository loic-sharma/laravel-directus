<div class="field">
	{{Form::label($name, directus_prettify($name), array('class' => 'primary'))}} <br>

	<input name="{{$name}}" value="{{$value}}" maxlength="10" class="small short_10 text_center date datepicker " type="text" size="10"> 
</div>