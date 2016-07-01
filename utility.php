<?php
    include 'includes/headers.php';
    include 'includes/db_utils.php';

    function getWhereConditionForString($dbFieldName, $comparisonValue)
    {
    	$whereExpression = "";
    	$pos = strpos($comparisonValue, "*");
    	$comparisonValueLength = strlen($comparisonValue);
    	
    	if ($comparisonValueLength == 0)
    		return $whereExpression;

    	if ($pos === false)
			$whereExpression .= " " . $dbFieldName. " ='". $comparisonValue ."'";
		else if ($pos == 0)
			$whereExpression .= " " . $dbFieldName. " REGEXP '" . substr($comparisonValue, 1) . "$'";
		else if ($pos == $comparisonValueLength-1)
			$whereExpression .= " " . $dbFieldName. " REGEXP '^" . substr($comparisonValue, 0, $comparisonValueLength-1) . "'";

		return $whereExpression;
    }

    function entryComplete($status, $cfno, $error, $conn)
	{
    	mysql_close($conn);
    	$headerString = "Location: data_entry_complete.php?status=" . $status;
 
      	if($status == "success")
      	{
      		if($cfno != -1)
      			$headerString .= "&cf_sno=" . $cfno;
      	}
      	else if($status == "failure")
      		$headerString .= "&error=" . $error;
      	
		header($headerString);
      	exit;
	}

	if( isset($_POST['data_submit']))
	{
	    $errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	    	entryComplete("failure", -1, $errorString, $conn);
	    	return;
	    }


	    $cfSnoKey = "";
	    $cfSno = -1;
	    $cfSnoValue = "";

	    if($_POST['status'] == "cf")
	    {
	    	$cfSnoKey = " `cf_sno`,";

	    	$sqlQuery = 'SELECT * FROM `cf_table`;';
	    	$q=mysql_query($sqlQuery);
	    	while($r=mysql_fetch_array($q))
			{
				$cfSno = $r['cf_count'] + 1;
			}

			$sqlQuery = 'UPDATE cf_table
						SET cf_count = ' . $cfSno .
						' WHERE cf_count = ' . ($cfSno - 1) . ';';
			$return=mysql_query($sqlQuery);
			if(!$return)
			{
				entryComplete("failure", -1, "Could not enter data: " . mysql_error(), $conn);
			}
			$cfSnoValue = $cfSno . '","';
	    }

	    $ataCodeDatabaseKey = " `ata_code`,";
	    $ataCodeValue = $_POST['ata_code'] .'","';
	    $delayCodeDatabaseKey = " `delay_code`,";
	    $delayCodeValue = $_POST['delay_code'] .'","';

	    //Hack for now to ata code issue that 0 was being added to the database when
	    // empty string is being sent as value for it
	    // TODO : Make the sql query generic
	    if($_POST['ata_code'] == "")
	    {
	    	$ataCodeDatabaseKey = "";
	    	$ataCodeValue = "";
	    }
	    if($_POST['delay_code'] == "")
	    {
	    	$delayCodeDatabaseKey = "";
	    	$delayCodeValue = "";
	    }

	    $sectorValue = "";
	    if($_POST['source'] != "" && $_POST['destination'] != "")
	    {
	    	$sectorValue = $_POST['source'] . $_POST['destination'];
	    }

	    $sql = 'INSERT INTO `snagrecords`
	    	(`aircraft_regno`,
	    	`entry_date`,
	    	`entry_time` ,
	    	`station`,
	    	`region`,
	    	`status`,
	    	`incoming_flight_no`,
	    	`outgoing_flight_no`,
	    	`sector`,
	    	`etd`,
	    	`atd`,
	    	`engg_delay`,
	    	`snag`,'
	    	. $ataCodeDatabaseKey
	    	. $delayCodeDatabaseKey
	    	. '`rectification`,
	    	`cf_expiry_date`,'
	    	. $cfSnoKey
	    	. '`remarks`)
	    	VALUES ("' . $_POST['aircraft_regno'] . '","'
	    	. $_POST['entry_date'] . '","'
	    	. $_POST['entry_time'] . '","'
	    	. $_POST['station'] . '","'
	    	. $_POST['region'] .'","'
	    	. $_POST['status'] .'","'
	    	. $_POST['incoming_flight_no'] .'","'
	    	. $_POST['outgoing_flight_no'] .'","'
	    	. $sectorValue .'","'
	    	. $_POST['etd'] .'","'
	    	. $_POST['atd'] .'","'
	    	. $_POST['engg_delay'] .'","'
	    	. $_POST['snag'] .'","'
	    	. $ataCodeValue
	    	. $delayCodeValue
	    	. $_POST['rectification'] .'","'
	    	. $_POST['cf_expiry_date'] .'","'
	    	. $cfSnoValue
	    	. $_POST['remarks'] .'")';

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      	entryComplete("failure", -1, "Could not enter data: " . mysql_error(), $conn);
	    }

		entryComplete("success", $cfSno, "", $conn);
	}

	else if (isset($_POST['delete_flight_record_action'])) 
	{
		$errorString;
   	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      	echo $errorString;
	   		return;
	    }

	    $sql = 'DELETE FROM `snagrecords` WHERE sno = ' . $_POST['delete_flight_record_action'] . ';';

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      //die('Could not enter data: ' . mysql_error());
	    	echo "could not run query";
	    	return;
	    }
	    mysql_close($conn);
	    
	    echo "success";
    }

    else if (isset($_POST['delete_component_record_action'])) 
	{
		$errorString;
   	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      	echo $errorString;
	   		return;
	    }

	    $sql = 'DELETE FROM `component_records` WHERE part_no = "' . $_POST['delete_component_record_action'] . '";';

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      //die('Could not enter data: ' . mysql_error());
	    	echo "could not run query";
	    	return;
	    }
	    mysql_close($conn);
	    
	    echo "success";
    }

    else if (isset($_POST['update_flight_record_submit'])) 
	{
		$errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      entryComplete("failure", -1, $errorString, $conn);
	    }		

	    $sectorValue = "";
	    if($_POST['source'] != "" && $_POST['destination'] != "")
	    {
	    	$sectorValue = $_POST['source'] . $_POST['destination'];
	    }

	    $sql = 'UPDATE `snagrecords`
	    		SET `aircraft_regno` = "' . $_POST['aircraft_regno'] . '",
	    		`entry_date` = "' . $_POST['entry_date'] . '",
	    		`station` = "' . $_POST['station'] . '",
	    		`region` = "' . $_POST['region'] . '",
	    		`status` = "' . $_POST['status'] . '",
	    		`incoming_flight_no` = "' . $_POST['incoming_flight_no'] . '",
	    		`outgoing_flight_no` = "' . $_POST['outgoing_flight_no'] . '",
	    		`sector` = "' . $sectorValue . '",
	    		`etd` = "' . $_POST['etd'] . '",
	    		`atd` = "' . $_POST['atd'] . '",
	    		`engg_delay` = "' . $_POST['engg_delay'] . '",
	    		`snag` = "' . $_POST['snag'] . '",
	    		`ata_code` = "' . $_POST['ata_code'] . '",
	    		`delay_code` = "' . $_POST['delay_code'] . '",
	    		`rectification` = "' . $_POST['rectification'] . '",
	    		`cf_expiry_date` = "' . $_POST['cf_expiry_date'] . '",
	    		`remarks` = "' . $_POST['remarks'] . '" 
				WHERE sno = ' . $_POST['sno'] . ';';
		//echo $sql;

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      entryComplete("failure", -1, "Could not enter data: " . mysql_error(), $conn);
	    }
	    
	    entryComplete("success", -1, "", $conn);
	}

	else if (isset($_POST['update_component_record_submit'])) 
	{
		$errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      entryComplete("failure", -1, $errorString, $conn);
	    }

	    $sql = 'UPDATE `component_records`
	    		SET `component_name` = "' . $_POST['component_name'] . '",
	    		`part_no` = "' . $_POST['part_no'] . '",
	    		`alternate_part_no` = "' . $_POST['alternate_part_no'] . '",
	    		`fin_no` = "' . $_POST['fin_no'] . '",
	    		`effectivity` = "' . $_POST['effectivity'] . '"
				WHERE part_no = "' . $_POST['part_no'] . '";';
		//echo $sql;

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      entryComplete("failure", -1, "Could not enter data: " . mysql_error(), $conn);
	    }
	    
	    entryComplete("success", -1, "", $conn);
	}

	else if (isset($_POST['component_data_submit']))
	{
		$errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	    	entryComplete("failure", -1, $errorString, $conn);
	    	return;
	    }

	    $sql = 'INSERT INTO `component_records`
	    	(`component_name`,
	    	`part_no`,
	    	`alternate_part_no` ,
	    	`fin_no`,
	    	`effectivity`)
	    	VALUES ("' . $_POST['component_name'] . '","'
	    	. $_POST['part_no'] . '","'
	    	. $_POST['alternate_part_no'] . '","'
	    	. $_POST['fin_no'] . '","'
	    	. $_POST['effectivity'] .'")';

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      	entryComplete("failure", -1, "Could not enter data: " . mysql_error(), $conn);
	    }

		entryComplete("success", -1, "", $conn);
	}
	else if (isset($_POST['login_submit'])) 
	{
	    $errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      	echo $errorString;
	   		return;
	    }

	    $sql = "SELECT * from `credentials` WHERE username = '" . $_POST['username'] ."'";

	    $retval = mysql_query( $sql, $conn );
	    if(! $retval )
	    {
	      	die('Could not fetch data: ' . mysql_error());
	    }
	    mysql_close($conn);
	    
	    $entered_while = false;
	    while($row=mysql_fetch_array($retval))
		{
			$entered_while = true;
			if($row['password'] == $_POST['password'])
			{
				$_SESSION['valid'] = true;
				$_SESSION['timeout'] = time();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['read_access'] = $row['read_access'];
				$_SESSION['write_access'] = $row['write_access'];
				header('Location: redirect.php?action=succeed');
			}
			else
				header('Location: login.php?username=' . $_POST['username'] . '&error=Wrong username or password');
		}

		if($entered_while == false)
			header('Location: login.php?username=' . $_POST['username'] . '&error=Wrong username or password');	
	}
?>