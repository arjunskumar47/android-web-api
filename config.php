<?php
	// DB host.  localhost in most of the cases.
	$app_hostname ="localhost";
	// DB name
	$app_database ="android_db";
	// DB user. root in case of XAMPP
	$app_username ="root";
	// DB Password. Blank in case of XAMPP
	$app_password ="";
 	// Connect to db using credentials
	$link = mysql_connect($app_hostname,$app_username,$app_password)
	or
	trigger_error(mysql_error(),E_USER_ERROR);
?>