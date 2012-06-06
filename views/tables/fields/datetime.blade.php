<div class="field">
	{{Form::label($name, directus_prettify($name), array('class' => 'primary'))}} <br>

	<div class="datetime_fields">
		<?php echo Form::select(null, array(
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'May',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Aug',
			'09' => 'Sep',
			'10' => 'Oct',
			'11' => 'Nov',
			'12' => 'Dec',
		), substr($value, 5, 2), array('class' => 'month')); ?>

		<input class="small short_1 text_center day force_numeric" type="text" size="2" maxlength="2" value="{{substr($value, 8, 2)}}">, 
		<input class="small short_4 text_center year force_numeric" type="text" size="4" maxlength="4" value="{{substr($value, 0, 4)}}"> @ 
		<input class="small short_1 text_center hour force_numeric" type="text" size="2" maxlength="2" value="{{substr($value, 11, 2)}}"> : 
		<input class="small short_1 text_center minute force_numeric" type="text" size="2" maxlength="2" value="{{substr($value, 14, 2)}}"> : 
		<input class="small short_1 text_center second force_numeric" type="text" size="2" maxlength="2" value="{{substr($value, 17, 2)}}"> 
		<input class="small short_6 text_center datetime " type="hidden" name="{{$name}}" value="{{$value}}">
	</div>			
</div>