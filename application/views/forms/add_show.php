<div class="form">
	<?php
		echo anchor('persons/add', 'Add person instead');
		echo form_fieldset('Add show');
		// Show validation errors and other user feedback 
		$this->load->view('display/user_feedback');
		// Show addshowform
		echo form_open('shows/save');
		echo form_label('Name: ', NAME);
		echo form_input(NAME, set_value(NAME, ''));
		echo form_label('Star year: ', START_YEAR);
		echo form_input(START_YEAR, set_value(START_YEAR, ''));
		echo form_label('End year: ', END_YEAR);
		echo form_input(END_YEAR, set_value(END_YEAR, ''));
		echo "<br>";
		echo form_label('Description: ', DESCRIPTION);
		echo "<br>";
		echo form_textarea(DESCRIPTION, set_value(DESCRIPTION, ''));
		echo "<br>";
		echo form_submit('submit', 'Save');
		echo form_fieldset_close();
		?>
</div>