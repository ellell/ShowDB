<div class="registration">	
	<fieldset>
		<legend>Registration</legend>
		<?php
		// Show validation errors and other user feedback 
		$this->load->view('display/user_feedback');
		// Show registration form
		echo form_open('registration/register_validation');
		echo form_label('First name', FIRSTNAME);
		echo form_input(FIRSTNAME, set_value(FIRSTNAME, ''));
		echo form_label('Last name', LASTNAME);
		echo form_input(LASTNAME, set_value(LASTNAME, ''));
		echo form_label('Email', EMAIL);
		echo form_input(EMAIL, set_value(EMAIL, ''));
		echo form_label('Username', USERNAME);
		echo form_input(USERNAME, set_value(USERNAME, ''));
		echo form_label('Password', PASSWORD);
		echo form_password(PASSWORD, '');
		echo form_label('Password confirmation', PASSWORD_CONFIRMATION);
		echo form_password(PASSWORD_CONFIRMATION, '');
		echo form_submit('submit', 'Send');
	?>
	</fieldset>
</div>