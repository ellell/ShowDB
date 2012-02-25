<?php
abstract class logger {
	/*
	**	Log errormessages to array and/or to file. For testing and statistic purposes
	*/
    public static $message_array = array();

    //Static function to log messages
    static function log_message($message, $variable = null) {
    	if(isset($variable)) {
    		$message .= $variable;
    	}
    	$message .= date(" (Y-m-d H:i:s)");
    	logger::$message_array[] = $message;
    }

    //Static function to log errors
    static function log_error($error) {
    	$error .= date("Y-m-d H:i:s");
    	logger::$message_array[] = '<span class="red">' . $error . '</span>';

    	$ipaddress = $_SERVER['REMOTE_ADDR'];
    	$message = "$error\n$ipaddress\n";
    	$File = "errors.txt";
    	$Open = fopen($File, "a+");
    	if ($Open){
    		fwrite($Open, "$message");
    		fclose ($Open);
    	}
    }
}
/* End of file logger.php */
/* Location: ./application/models/logger.php */