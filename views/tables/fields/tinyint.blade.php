<div class="field">
	{{Form::checkbox($name, '1', (bool)$value)}}

	{{Form::label($name, directus_prettify($name), array('class'=>'primary'))}} <br>
</div>