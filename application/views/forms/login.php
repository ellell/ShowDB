<div class="login">
	<fieldset>
		<legend>Login</legend>
		<?php
		// Show validation errors and other user feedback 
		//var_dump(feedback::$feedback_array);
		$this->load->view('display/user_feedback');
		// Show loginform
		echo form_open('/login/login_validation');
		echo form_label('Username', USERNAME);
		echo form_input(USERNAME, set_value(USERNAME, ''));
		echo form_label('Password', PASSWORD);
		echo form_password(PASSWORD, '');
		echo form_submit('submit', 'Log in');
		echo form_label('Remember me', REMEMBER_ME);
		echo form_checkbox(REMEMBER_ME, REMEMBER_ME, TRUE);
		?> <p class="info">Checking 'remember me' will create a cookie on your computer and automatically log you in on your next visit to this page.</p> <?php
		echo anchor('registration', 'Sign up');
		?>
	</fieldset>
</div>