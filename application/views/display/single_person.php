<div class="displaysingle">
	<?php
		$first_name = $person->get_first_name();
		$last_name = $person->get_last_name();
		$description = $person->get_description();
	?>
	<h2><?php echo $first_name . " " . $last_name ?></h2>
	<p><?php echo $description ?></p>
	<div class="castandcrew">
		<ul>
		<?php 
			// Display castmembers and their characternames. 
			foreach($cast as $cast_member) :
			$character_name = $cast_member->get_character_name();
			$showID = $cast_member->get_showID();
			$show = $this->display_handler->get_show_by_ID($showID);
			$name = $show->get_name();
			?> <li> <?php
			echo anchor("shows/show/$showID", $name);
			echo "<p class='listextra'> (" . $character_name . ")</p>";
			?> </li> <?php
			endforeach;
		?>	
		</ul>
	</div>
</div>