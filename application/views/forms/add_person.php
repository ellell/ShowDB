<div class="form">
	<?php	
	echo anchor('shows/add', 'Add show instead');
	echo form_fieldset('Add person');
	// Show validation errors and other user feedback 
	$this->load->view('display/user_feedback');
	echo form_open('persons/save');
	echo form_label('Firstname: ', FIRSTNAME);
	echo form_input(FIRSTNAME, set_value(FIRSTNAME, ''));
	echo form_label('Lastname: ', LASTNAME);
	echo form_input(LASTNAME, set_value(LASTNAME, ''));
	echo "<br>";
	echo form_label('Description: ', DESCRIPTION);
	echo "<br>";
	echo form_textarea(DESCRIPTION, set_value(DESCRIPTION, ''));
	echo "<br>";
	echo form_submit('submit', 'Save');
	echo form_fieldset_close();
	?>
</div>

