<?php
	//the database connection file
	require_once("config.php");
	mysql_select_db($app_database,$link) or die("cannot select DB");
	$table_name = "meta";
	$timestamp = $_REQUEST['time'];
	$latitude = $_REQUEST['lat'];
	$longitude = $_REQUEST['lon'];
	$type = $_REQUEST['type'];
	$filename = $timestamp . '.' . $type;
	$url_destination = dirname(__FILE__).'/uploads/' . $filename;
	// $base = $_REQUEST['file'];
	$target_path = "uploads/";
 
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
 
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
	{
		$sql = "INSERT INTO $table_name(filename, filepath, time, latitude, longitude) VALUES('$filename', '$target_path', '$timestamp', '$latitude', '$longitude')";
		$result = mysql_query($sql);
		if ( $result )
		{
	    	echo 'The file' .  basename( $_FILES['uploadedfile']['name']). ' has been uploaded';
	    	mysql_close();
	    	// return a message back to android app for verification in app
	    	return "success";
	    }
	} 
	else
	{
	    echo "There was an error uploading the file, please try again!";
	    echo "filename: " .  basename( $_FILES['uploadedfile']['name']);
	    echo "target_path: " .$target_path;
	    // return a message back to android app for verification in app
	    return "notsuccess";
	}
	mysql_close();
?>