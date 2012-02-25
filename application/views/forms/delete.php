<div class="form">
	<?php
	// If a show object is sent as parameter - set name, redirect link, type and hidden field accordingly
	if(isset($show)){
		$name = $show->get_name();
		$redirect = "shows/show/" . $show->get_ID();
		$type = "shows";
		$hidden = array(ID => $show->get_ID());
	}
	// If a person object is sent as parameter - set name, redirect link, type and hidden field accordingly
	else if(isset($person)){
		$name = $person->get_first_name() . " " . $person->get_last_name();
		$redirect = "persons/show" . $person->get_ID();
		$type = "persons";
		$hidden = array(ID => $person->get_ID());
	}
	// If a cast member object is sent as parameter - set name, redirect link, typ and hidden field accordingly
	else if(isset($cast_member)){
		$name = $cast_member->get_character_name();
		$redirect = "shows/show" . $cast_member->get_showID();
		$type = "cast_members";
		$hidden = array(ID => $cast_member->get_ID());
	}
	echo anchor("/", 'cancel');
	?>
	<p>Are you sure you want to delete <?php echo ($name); ?>? You can not undo this action.</p>
	<?php
	// Show deleteform
	$this->load->view('display/user_feedback');
	echo form_open($type.'/delete', '', $hidden);
	echo form_submit('submit', 'Delete');
	?>
</div>