<div class="form">
	<?php	
	echo form_fieldset('Update person');
	// Show validation errors and loginerrors
	echo validation_errors("<p class='error'>"); ?>
	<p class='error'> </p>
	<?php
	$this->load->view('display/user_feedback');
	// Show update person form with hidden field for ID
	$hidden = array(ID => $person->get_ID());
	echo form_open('persons/update', '', $hidden);
	echo form_label('Firstname: ', FIRSTNAME);
	echo form_input(FIRSTNAME, $person->get_first_name());
	echo form_label('Lastname: ', LASTNAME);
	echo form_input(LASTNAME, $person->get_last_name());
	echo "<br>";
	echo form_label('Description: ', DESCRIPTION);
	echo "<br>";
	echo form_textarea(DESCRIPTION, $person->get_description());
	echo "<br>";
	
	echo form_submit('submit', 'Save');
	echo form_fieldset_close();
	?>
</div>

