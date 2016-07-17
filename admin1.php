<?php
    include 'includes/headers.php';
    include 'includes/login_check.php';
    include 'includes/admin_constraint.php';
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
      
      <div id="menubar">
  <ul id="menu">
    <li id="menuEntryHome"><a class="menubar-entry" href="admin.php">Home</a></li>
   
  </ul>
</div><!--close menubar-->


      <!-- Login Area -->
      <?php
      include 'includes/login_area.php';
      ?>
      <div style="clear:both;"></div>
    </div><!--close header-->
  </div><!--close header_container-->  
  <div id="main">
	<div id="site_content" style="width:100%;">

      <div id="content_search_page" style"">
        <div class="content_item_search_page" style"width:100%;">
        <?php
          	
          		$errorString;
			    $conn = connectToDB($errorString);
			    if(! $conn )
			    {
			      die($errorString);
			    }
	    ?>
				<table class="gridBlue" style="width:100%" border=1>
	            	<tr>
                        <th>Serial No.</th>
	                    <th>Username</th>
	                    <th>Password</th>
	                    <th>Read Access</th>
                        <th>Write Access</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>

		<?php
				

			    $sql = "SELECT * FROM `credentials`";

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
                    $serial=1;
				while($r=mysql_fetch_array($q))
				{

		?>			
					<script>
						var MCCRow = {};
						MCCRow['username'] = "<?php echo cleanString($r['username']) ?>";
						MCCRow['password'] = "<?php echo cleanString($r['password']) ?>";
						MCCRow['read_acess'] = "<?php echo cleanString($r['read_access']) ?>";
						MCCRow['write_access'] = "<?php echo cleanString($r['write_access']) ?>";
						MCCData.push(MCCRow);
					</script>
	            		<tr id="<?php echo $r['username']; ?>">
                            <td name = "serial_no"><?php echo $serial; $serial++; ?></td>
	                        <td name = "username"><?php echo $r['username']; ?></td>
	                        <td name = "password"><?php echo $r['password']; ?></td>
	                        <td name = "read_access"><?php echo $r['read_access']; ?></td>
	                        <td name = "write_access"><?php echo $r['write_access']; ?></td>
	                        <td><a onclick="DeleteCredentialsRecordRow('<?php echo $r['username'];?>')">Delete</button></td>
	                        <td><a onclick="EditCredentialsRecordRow(this)">Edit</button></td>
	                    </tr>
        <?php
				}
		?>
            	</table>
		
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