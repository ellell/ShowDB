<div class="displayall">
	<ul>
		<?php foreach ($shows as $show):
		$name = $show->get_name(); 
		$years = $show->get_start_year() . " - ";
		if($show->get_end_year() != '0000'){
			$years .= $show->get_end_year();
		}
		$id = $show->get_ID();
		?>
		<li>
			<?php echo anchor("shows/show/$id", $name) ?>
			<p class="listextra"><?php echo " (" . $years . ")" ?></p> 
		</li>
		<?php endforeach;?>
	</ul>
</div>