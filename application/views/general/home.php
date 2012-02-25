<div class="home">
	<h2>Welcome</h2>
	<p>Everyone can browse shows and people, but only registered users can add shows/people themselves.</p>
	
	<div class="randomdisplay">
		<h3>Random selection of shows and people from database</h3>
		<?php $this->load->view('display/shows'); ?>
		<?php $this->load->view('display/persons'); ?>
		<div class="clear"></div>
	</div>
</div>