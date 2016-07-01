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

      <div id="content_search_page" style"">
        <div class="content_item_search_page" style"width:100%;">
        <?php
          	if( isset($_POST['search_components_submit'])) 
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
	                    <th>Component Name</th>
	                    <th>Component Part No.</th>
	                    <th>Component Alternate Part No.</th>
	                    <th>Fin No.</th>
	                    <th>Effectivity</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>

		<?php
				$whereval = "";

				if (!empty($_POST['component_name'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					// $whereval .= " component_name ='". $_POST['component_name'] ."'";
					$whereval .= getWhereConditionForString("component_name", $_POST['component_name']);
				}

				if (!empty($_POST['part_no'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					// $whereval .= " part_no ='". $_POST['part_no'] ."'";
					$whereval .= getWhereConditionForString("part_no", $_POST['part_no']);
				}

				if (!empty($_POST['alternate_part_no'])) {
					if (strlen($whereval) > 0) {
							$whereval .= " AND";
						}
					//$whereval .= " alternate_part_no ='". $_POST['alternate_part_no'] ."'";
					$whereval .= getWhereConditionForString("alternate_part_no", $_POST['alternate_part_no']);
				}

				if (!empty($_POST['fin_no'])) {
					if (strlen($whereval) > 0) {
						$whereval .= " AND";
					}
					// $whereval .= " fin_no ='". $_POST['fin_no'] ."'";
					$whereval .= getWhereConditionForString("fin_no", $_POST['fin_no']);
				}

			    $sql = "SELECT * from `component_records`";
				if (strlen($whereval) > 0) {
					$sql .= " WHERE";
					$sql .= $whereval;
				}
			    $sql .= " ORDER BY component_name";
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
						MCCRow['component_name'] = "<?php echo cleanString($r['component_name']) ?>";
						MCCRow['part_no'] = "<?php echo cleanString($r['part_no']) ?>";
						MCCRow['alternate_part_no'] = "<?php echo cleanString($r['alternate_part_no']) ?>";
						MCCRow['fin_no'] = "<?php echo cleanString($r['fin_no']) ?>";
						MCCRow['effectivity'] = "<?php echo cleanString($r['effectivity']) ?>";
						MCCData.push(MCCRow);
					</script>
	            		<tr id="<?php echo $r['part_no']; ?>">
	                        <td name = "component_name"><?php echo $r['component_name']; ?></td>
	                        <td name = "part_no"><?php echo $r['part_no']; ?></td>
	                        <td name = "alternate_part_no"><?php echo $r['alternate_part_no']; ?></td>
	                        <td name = "fin_no"><?php echo $r['fin_no']; ?></td>
	                        <td name = "effectivity"><?php echo $r['effectivity']; ?></td>	
	                        <td><a onclick="DeleteComponentRecordRow('<?php echo $r['part_no'];?>')">Delete</button></td>
	                        <td><a onclick="EditComponentRecordRow(this)">Edit</button></td>
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