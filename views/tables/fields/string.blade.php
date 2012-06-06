<div class="field">
	{{Form::label($name, directus_prettify($name), array('class' => 'primary'))}} <br>

	@if($length != false)
		<input class="track_max_length" name="{{$name}}" type="text" value="{{$value}}" maxlength="{{$length}}">
		<span class="char_count">{{$length - strlen($value)}}</span>
	@else
		<input name="{{$name}}" type="text" value="{{$value}}">
	@endif
</div>