<div class="displaysingle">
	<?php
	// Get and display name and description
	$name = $show->get_name();
	$years = $show->get_start_year() . " - ";
	if($show->get_end_year() != '0000'){
		$years .= $show->get_end_year();
	}
	$description = $show->get_description();
	?>
	<h2><?php echo $name ?></h2>
	<p><?php echo $years ?></p>
	<p><?php echo $description ?></p>
	<div class="castandcrew">
		<ul>
		<?php 
			// Display castmembers and their characternames. 
			foreach($cast as $cast_member) :
			$character_name = $cast_member->get_character_name();
			$personID = $cast_member->get_personID();
			$ID = $cast_member->get_ID();
			$person = $this->display_handler->get_person_by_ID($personID);
			$name = $person->get_first_name() . " " . $person->get_last_name();
			?> <li> <?php
			echo anchor("persons/show/$personID", $name);
			echo "<p class='listextra'> as " . $character_name . "</p>";
			if($is_logged_in){
				?> <span class="admin"> <?php
				echo anchor("cast_members/edit/$ID", 'edit');
				echo anchor("cast_members/confirm_delete/$ID", 'delete');
				?> </span> <?php
			}
			?> </li> <?php
			endforeach;
		?>	
		</ul>
	</div>
	<?php
	
	?>
</div>