<div class="logout">
	<p>Are you sure you want to log out?</p>
		<?php
		// Show logoutform
		echo form_open('login/logout');
		echo form_submit('submit', 'Log out');
		?>
</div>