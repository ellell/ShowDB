<div class="adminpanel">
<?php
echo anchor("$edit_type/edit/$editID", 'edit info');
echo anchor("$edit_type/confirm_delete/$editID", 'delete');
if($this->uri->segment(1) == 'shows'){
	echo anchor("cast_members/add/$editID", 'add cast');
}
?>
</div>