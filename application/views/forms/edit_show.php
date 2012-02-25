<div class="form">
	<?php
		echo form_fieldset('Update show');
		// Show validation errors and loginerrors
		echo validation_errors("<p class='error'>"); ?>
		<p class='error'> </p>
		<?php
		$this->load->view('display/user_feedback');
		// Show update show form with hidden field for showID
		$hidden = array(ID => $show->get_ID());
		echo form_open('shows/update', '', $hidden);
		echo form_label('Name: ', NAME);
		echo form_input(NAME, set_value(NAME, $show->get_name()));
		echo form_label('Star year: ', START_YEAR);
		echo form_input(START_YEAR, set_value(START_YEAR, $show->get_start_year()));
		echo form_label('End year: ', END_YEAR);
		echo form_input(END_YEAR, set_value(END_YEAR, $show->get_end_year()));
		echo "<br>";
		echo form_label('Description: ', DESCRIPTION);
		echo "<br>";
		echo form_textarea(DESCRIPTION, set_value(DESCRIPTION, $show->get_description()));
		echo "<br>";
		echo form_submit('submit', 'Save');
		echo form_fieldset_close();
		?>
</div>