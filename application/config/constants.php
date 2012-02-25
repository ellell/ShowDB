<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Registration/login
|--------------------------------------------------------------------------
|
| These are used when working with registration and login
|
*/
define('USERNAME', 'username');
define('PASSWORD', 'password');
define('PASSWORD_CONFIRMATION', 'passwordconfirm');
define('FIRSTNAME', 'firstname');
define('LASTNAME', 'lastname');
define('EMAIL', 'email');
define('SUBMIT', 'submit');
define('REMEMBER_ME', 'rememberme');

/*
|--------------------------------------------------------------------------
| Database tables and fields
|--------------------------------------------------------------------------
|
| These are used when working with the database
|
*/
define('ID', 'id');
define('NAME', 'name');
define('START_YEAR', 'startYear');
define('END_YEAR', 'endYear');
define('DESCRIPTION', 'description');
define('IMAGE', 'image');
define('TYPE', 'type');
define('PERSONID', 'personID');
define('SHOWID', 'showID');
define('IMPORTANCE', 'importance');
define('CHARACTER_NAME', 'characterName');

/*
|--------------------------------------------------------------------------
| Login names
|--------------------------------------------------------------------------
|
| These are used when working with login and userhandling
|
*/
define('IS_LOGGED_IN', 'isLoggedIn');

/* End of file constants.php */
/* Location: ./application/config/constants.php */