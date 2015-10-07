<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRAMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url();?>resources/css/style.css" rel="stylesheet">
		<link href="<?=base_url();?>resources/css/e_style.css" rel="stylesheet">
		<link href="<?=base_url();?>resources/css/media.css" rel="stylesheet">
		<link href="<?=base_url();?>resources/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url();?>resources/semantic/semantic.min.css" rel="stylesheet">
	</head>

	<body>
		<?php echo form_open('auth/user-login'); ?>
		<div class="container" id="homewrapper">
			
			<img src="<?=base_url();?>resources/images/logo/code_republiq.png" class="center-block"/>
			
			<div class="center-block" id="loginform">

				<div class="ui fluid icon input">
					<?php
						echo form_input(array(
							'name' => 'username',
							'placeholder' => 'Username',
							'autocomplete' => 'off',
							'value' => set_value('username')
						));
					?>
					<i class="user icon"></i>
				</div>
				<?php echo form_error('username'); ?>

				<div class="ui fluid icon input" id="passwordinput">
					<?php
						echo form_password(array(
							'name' => 'password',
							'placeholder' => 'Password'
						));
					?>
					<i class="lock icon"></i>
				</div>
				<?php echo form_error('password'); ?>

				<div class="ui checkbox" id="remember">
					<input type="checkbox" name="remember" value="on" id="rememberme">
					<label for="rememberme">Remember me in this device</label>
				</div>

				<?php echo isset($login_error) ? $login_error : ''; ?>
				
				<div class="ui">
					<div class="ui fluid inverted blue button" id="loginbutton">
						<input type='submit' value='Login' style="border: none; height: 30px;" />
					</div>
				</div>
			</div>
		</div>
		<?php echo  form_close(); ?>
	</body>
</html>