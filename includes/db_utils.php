<?php

    function connectToDB(&$errorString)
    {
    	$dbhost = 'localhost';
	    $dbuser = 'root@localhost';
	    //$dbpass = '';
	    $conn = mysql_connect($dbhost, $dbuser);
	    if(! $conn )
	    {
	      	$errorString =  'Could not connect: ' . mysql_error();
	   		return null;
	    }

	    $dbSelected = mysql_select_db('mccairindia');
	    if (!$dbSelected )
	    {
	      	//die('couldnt select db' . mysql_error()); 
	    	$errorString = "could not select database";
	    	return null;
	    }

	    $errorString = "success";
	    return $conn;
    }
?>