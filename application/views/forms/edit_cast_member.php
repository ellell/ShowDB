<div class="form">
	<?php
	echo form_fieldset('Update cast member');
	// Show validation errors and loginerrors
	$this->load->view('display/user_feedback');
	$hidden = array(
		ID => $cast_member->get_ID(),
		SHOWID => $cast_member->get_showID()
		);
	echo form_open('cast_members/update', '', $hidden);
	$this->load->model('display_handler');
	$persons = $this->display_handler->get_all_persons();
	$options = array();
	foreach ($persons as $person) : 
	$options[$person->get_ID()] = $person->get_first_name() . ' ' . $person->get_last_name();
	endforeach;
    echo form_dropdown(PERSONID, $options, $cast_member->get_personID());
	echo form_label(' Name of character: ', CHARACTER_NAME);
	echo form_input(CHARACTER_NAME, set_value(CHARACTER_NAME, $cast_member->get_character_name()));
	$options = array(
		'1' => 'Main actor', 
		'2' => 'Supporting actor',
		'3' => 'Minor part'
	);
	echo form_dropdown(IMPORTANCE, $options, $cast_member->get_importance());
	echo "<br>";
	echo form_submit('submit', 'Save');
	echo form_fieldset_close();
	?>
</div>