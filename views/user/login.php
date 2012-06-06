<div id="shake">
	<?php echo Form::open('directus/login', 'POST', array('id' => 'login_form', 'name' => 'login_form')); ?>
		<?php echo Form::label('email', 'Email', array('class' => 'primary')); ?><br>
		<?php echo Form::text('email', '', array('class' => 'title', 'maxlength' => '50')); ?>

		<?php echo Form::label('password', 'Password', array('class' => 'primary')); ?><br>
		<?php echo Form::password('password', array('id' => 'login_password', 'maxlength' => '50')); ?><br>

		<?php echo Form::checkbox('remember', 'true', false, array('id' => 'remember_me')); ?>
		<?php echo Form::label('remember', 'Remember Me'); ?><br />

		<?php echo Form::submit('login', array('class' => 'button big color login')); ?>
		<a href="<?php echo URL::to('directus/forgot'); ?>" id="forgot_password">Forgot your password?</a>		
	<?php echo Form::close(); ?>
</div>