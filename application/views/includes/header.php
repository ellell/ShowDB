<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head> 
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<title><?php echo $title ?></title> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
		<link rel="stylesheet" type="text/css" href="/projektarbete/application/css/style.css" />
	</head> 
	<body>
	<div id="header"><h1>PHP-projekt</h1></div>
	<div id="navigation">
		<ul>
			<li><?php echo anchor('/', 'Home'); ?></li>
			<li><?php echo anchor('shows/show', 'Browse shows'); ?></li>
			<li><?php echo anchor('persons/show', 'Browse people'); ?></li>
			<li><?php echo anchor('shows/add', 'Add show/person'); ?></li>
		</ul>
	</div>
	<div id="status">
		<?php 
		if($is_logged_in){
			?><p>You are logged in. <?php echo anchor('/login', 'Log out'); ?></p><?php
		}
		else{
			?><p>You are logged out. <?php echo anchor('/login', 'Log in'); ?></p><?php	
		}
		?>
	</div>
	<div id="container">
		