<?php
    include 'includes/headers.php';
    include 'includes/login_check.php';
    include 'includes/read_constraint.php';
    include 'utility.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>MCC Air India</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type="text/javascript" src="main.js"></script>
  <script>
    function convertArrayOfObjectsToCSV(args) {
        var result, ctr, keys, columnDelimiter, lineDelimiter, data;

        data = args.data || null;
        if (data == null || !data.length) {
            return null;
        }

        columnDelimiter = args.columnDelimiter || ',';
        lineDelimiter = args.lineDelimiter || '\n';

        keys = Object.keys(data[0]);

        result = '';
        result += keys.join(columnDelimiter);
        result += lineDelimiter;

        data.forEach(function(item) {
            ctr = 0;
            keys.forEach(function(key) {
                if (ctr > 0) result += columnDelimiter;

                result += item[key];
                ctr++;
            });
            result += lineDelimiter;
        });

        return result;
    }

    function downloadCSV(args) {
        var data, filename, link;

        var csv = convertArrayOfObjectsToCSV({
            data: MCCData
        });
        if (csv == null) return;

        filename = args.filename || 'export.csv';

        if (!csv.match(/^data:text\/csv/i)) {
            csv = 'data:text/csv;charset=utf-8,' + csv;
        }
        data = encodeURI(csv);

        link = document.createElement('a');
        link.setAttribute('href', data);
        link.setAttribute('download', filename);
        link.click();
    }

    var MCCData = [];
  </script>

</head>

<body onload="document.getElementById('menuEntrySearchRecords').className += 'current';">
  <div id="header_container">  
    <div id="header">
	  <div id="banner">
	    <h1><span>MCC</span> Air India</h1>
	  </div><!--close banner-->	
	  <div id="banner_slogan">
        <img src="images/airindia-logo.png" alt="Air India" title="Air India" height="69" width="208">
	  </div><!--close banner_slogan-->
      <div style="clear:both;"></div>	
      
      <?php
      include 'includes/menubar.php';
      ?>

      <!-- Login Area -->
      <?php
      include 'includes/login_area.php';
      ?>
      <div style="clear:both;"></div>
    </div><!--close header-->
  </div><!--close header_container-->  
  <div id="main">
	<div id="site_content" style="width:100%;">

	<a href='#' onclick='downloadCSV({ filename: "mccreport.csv" });' data-container="body" data-placement="bottom" data-original-title="Export as the popular CSV format. Use this for importing in an Email program">Export as CSV</a>

      <div id="content_search_page" style"">
        <div class="content_item_search_page" style"width:100%;">
        <?php
          	if( isset($_POST['search_submit'])) 
          	{
          		$errorString;
			    $conn = connectToDB($errorString);
			    if(! $conn )
			    {
			      die($errorString);
			    }
	    ?>
				<table class="gridBlue" style="width:100%" border=1>
	            	<tr>
	                    <th>Aircraft Regn. No.</th>
	                    <th>Flight Date</th>
	                    <th>Station</th>
	                    <th>Region</th>
	                    <th>Status</th>
	                    <th>Incoming Flight No.</th>
	                    <th>Outgoing Flight No.</th>
	                    <th>Sector</th>
	                    <th>ETD</th>
	                    <th>ATD</th>
	                    <th>Engg Delay</th>
	                    <th>Snag</th>
	                    <th>ATA Code</th>
	                    <th>Delay Code</th>
	                    <th>Rectification</th>
	                    <th>C/F Expiry date</th>
	                    <th>C/F No.</th>
	                    <th>Remarks</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>

		<?php
				$whereval = "";

				if (!empty($_POST['aircraft_regno'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					// $whereval .= " aircraft_regno ='". $_POST['aircraft_regno'] ."'";
					$whereval .= getWhereConditionForString("aircraft_regno", $_POST['aircraft_regno']);
				}

				if (!empty($_POST['entry_date_from'])) {

					if (!empty($_POST['entry_date_to']))
					{
						if (strlen($whereval) > 0) {
							$whereval .= " AND";
						}
						$whereval .= " entry_date >='". $_POST['entry_date_from'] ."' AND entry_date <='" . $_POST['entry_date_to'] ."'";
					}
					else
					{
						if (strlen($whereval) > 0) {
							$whereval .= " AND";
						}
						$whereval .= " entry_date >='". $_POST['entry_date_from'] ."'";
					}
				}
				else if (!empty($_POST['entry_date_to'])) {
					if (strlen($whereval) > 0) {
							$whereval .= " AND";
						}
						$whereval .= " entry_date <='". $_POST['entry_date_to'] ."'";
				}

				if (!empty($_POST['status'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					$whereval .= " status ='". $_POST['status'] ."'";
				}
				if (!empty($_POST['ata_code'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					$whereval .= " ata_code ='". $_POST['ata_code'] ."'";
				}
				if (!empty($_POST['cf_expiry_date'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					$whereval .= " cf_expiry_date ='". $_POST['cf_expiry_date'] ."'";
				}

			    $sql = "SELECT * from `snagrecords`";
				if (strlen($whereval) > 0) {
					$sql .= " WHERE";
					$sql .= $whereval;
				}
			    $sql .= " ORDER BY entry_date";
			    $sql .= ";";
				$q=mysql_query($sql);
			    if(! $q )
			    {
			      die('Could not fetch data: ' . mysql_error());
			    }

				function cleanString ($str) {
					$cleanStr = $str;
					$cleanStr = preg_replace("/\r?\n/", "", $cleanStr);
					$cleanStr = preg_replace('/"/', "\'", $cleanStr);
					$cleanStr = preg_replace("/,/", "\ |", $cleanStr);
					return $cleanStr;
				}

				while($r=mysql_fetch_array($q))
				{

		?>			
					<script>
						var MCCRow = {};
						MCCRow['aircraft_regno'] = "<?php echo cleanString($r['aircraft_regno']) ?>";
						MCCRow['entry_date'] = "<?php echo cleanString($r['entry_date']) ?>";
						MCCRow['entry_time'] = "<?php echo cleanString($r['entry_time']) ?>";
						MCCRow['station'] = "<?php echo cleanString($r['station']) ?>";
						MCCRow['region'] = "<?php echo cleanString($r['region']) ?>";
						MCCRow['status'] = "<?php echo cleanString($r['status']) ?>";
						MCCRow['incoming_flight_no'] = "<?php echo cleanString($r['incoming_flight_no']) ?>";
						MCCRow['outgoing_flight_no'] = "<?php echo cleanString($r['outgoing_flight_no']) ?>";
						MCCRow['sector'] = "<?php echo cleanString($r['sector']) ?>";
						MCCRow['etd'] = "<?php echo cleanString($r['etd']) ?>";
						MCCRow['atd'] = "<?php echo cleanString($r['atd']) ?>";
						MCCRow['engg_delay'] = "<?php echo cleanString($r['engg_delay']) ?>";
						MCCRow['snag'] = "<?php echo cleanString($r['snag']) ?>";
						MCCRow['ata_code'] = "<?php if($r['ata_code']==""){echo cleanString("-");} else {echo cleanString($r['ata_code']);} ?>";
						MCCRow['delay_code'] = "<?php echo cleanString($r['delay_code']) ?>";
						MCCRow['rectification'] = "<?php echo cleanString($r['rectification']) ?>";
						MCCRow['cf_expiry_date'] = "<?php echo cleanString($r['cf_expiry_date']) ?>";
						MCCRow['cf_sno'] = "<?php echo cleanString($r['cf_sno']) ?>";
						MCCRow['remarks'] = "<?php echo cleanString($r['remarks']) ?>";
						MCCData.push(MCCRow);
					</script>
	            		<tr id="<?php echo $r['sno']; ?>">
	                        <td name = "aircraft_regno"><?php echo $r['aircraft_regno']; ?></td>
	                        <td name = "entry_date"><?php echo $r['entry_date']; ?></td>
	                        <td name = "station"><?php echo $r['station']; ?></td>
	                        <td name = "region"><?php echo $r['region']; ?></td>
	                        <td name = "status"><?php echo strtoupper($r['status']); ?></td>
	                        <td name = "incoming_flight_no"><?php echo $r['incoming_flight_no']; ?></td>
	                        <td name = "outgoing_flight_no"><?php echo $r['outgoing_flight_no']; ?></td>
	                        <td name = "sector"><?php if($r['sector']==""){echo "-";} else {echo (substr($r['sector'],0,3) . "-" .  substr($r['sector'],3,3));} ?></td>
	                        <td name = "etd"><?php if($r['etd']=="00:00:00"){echo "-";} else {echo $r['etd'];} ?></td>
	                        <td name = "atd"><?php if($r['atd']=="00:00:00"){echo "-";} else {echo $r['atd'];} ?></td>
	                        <td name = "engg_delay"><?php if($r['engg_delay']=="00:00:00"){echo "-";} else {echo $r['engg_delay'];} ?></td>
	                        <td name = "snag"><?php if($r['snag']==""){echo "-";} else {echo $r['snag'];} ?></td>
	                        <td name = "ata_code"><?php if($r['ata_code']==""){echo "-";} else {echo $r['ata_code'];} ?></td>
	                        <td name = "delay_code"><?php if($r['delay_code']==""){echo "-";} else {echo $r['delay_code'];} ?></td>
	                        <td name = "rectification"><?php if($r['rectification']==""){echo "-";} else {echo $r['rectification'];} ?></td>
	                        <td name = "cf_expiry_date"><?php if($r['cf_expiry_date']=="0000-00-00"){echo "-";} else {echo $r['cf_expiry_date'];} ?></td>
	                        <td name = "cf_sno"><?php if($r['cf_sno'] == "-1"){echo "-";} else {echo $r['cf_sno'];} ?></td>
	                        <td name = "remarks"><?php if($r['remarks']==""){echo "-";} else {echo $r['remarks'];} ?></td>
	                        <td><a onclick="DeleteFlightRecordRow(<?php echo $r['sno'];?>)">Delete</button></td>
	                        <td><a onclick="EditFlightRecordRow(this)">Edit</button></td>
	                    </tr>
        <?php
				}
		?>
            	</table>
		<?php
          	}
  		?>
	    </div><!--close content_item-->
	  </div><!--content-->   
	</div><!--close site_content-->	 
  </div><!--close main--> 
  <div id="footer_container">     
	<div id="footer">
      <footer> <small>&copy; Copyright 2015, MCC Air India</small> </footer>
    </div><!--close footer-->
  </div><!--close footer_container--> 
</body>
</html>