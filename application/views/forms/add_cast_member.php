<div class="form">
	<?php	
	echo form_fieldset('Add cast member to \'' . $show->get_name() . '\'');
	// Show validation errors and other user feedback 
	$this->load->view('display/user_feedback');
	?><p class="info">Can't find the person you want to add in the list? A person must be <?php echo anchor('persons/add', 'added to database');?> before you can add them as cast. </p>
	<?php
	// Show addcastform, hidden field with showID
	$hidden = array(SHOWID => $show->get_ID());
	echo form_open('cast_members/save', '', $hidden);
	// Get all persons from database and populate dropdownmenu with them
	$this->load->model('display_handler');
	$persons = $this->display_handler->get_all_persons();
	$options = array();
	foreach ($persons as $person) : 
	$options[$person->get_ID()] = $person->get_first_name() . ' ' . $person->get_last_name();
	endforeach;
    echo form_dropdown(PERSONID, $options);
	echo form_label(' Name of character: ', CHARACTER_NAME);
	echo form_input(CHARACTER_NAME, set_value(CHARACTER_NAME, ''));
	$options = array(
		'1' => 'Main actor', 
		'2' => 'Supporting actor',
		'3' => 'Minor part'
	);
	echo form_dropdown(IMPORTANCE, $options);	
	echo "<br>";
	echo form_submit('submit', 'Save');
	echo form_fieldset_close();
	?>
</div>