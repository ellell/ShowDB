<div class="displayall">
	<ul>
		<?php 
			foreach ($persons as $person):
			$first_name = $person->get_first_name(); 
			$last_name = $person->get_last_name();
			$id = $person->get_ID();
			?>
			<li><?php echo anchor("persons/show/$id", $first_name . " " . $last_name) ?></li>
		<?php endforeach;?>
	</ul>
</div>