<?php
  include 'includes/headers.php';
  include 'includes/login_check.php';
    include 'includes/admin_constraint.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>MCC Air India</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #528CCC;
    color: white;
}
    </style>
</head>

<body onload="document.getElementById('menuEntryHome').className += 'current';">
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
	<div id="site_content">
      <div id="content">
        <div class="content_item">
          <h2>Credentials</h2>
          
      <?php
        $dbhost = 'localhost';
	    $dbuser = 'root';
	    //$dbpass = '';
	    $conn = mysql_connect($dbhost, $dbuser);
	    if(! $conn )
	    {
	      	die('Could not connect: ' . mysql_error());
	    }  

	    $dbSelected = mysql_select_db('mccairindia');
	    if (!$dbSelected )
	    {
	      	die('couldnt select db' . mysql_error()); 
	    	
	    }

$sql = "SELECT * FROM `credentials`";
$q=mysql_query($sql);
 if(! $q )
			    {
			      die('Could not fetch data: ' . mysql_error());
			    }

     echo "<table><tr><th>Username</th><th>Password</th><th>Read_Access</th><th>Write_Access</th><th>Delete</th></tr>";
     // output data of each row
     while($row = mysql_fetch_array($q)) {
         echo "<tr><td>" . $row["username"]. "</td><td>" . $row["password"].  "</td><td>" . $row["read_access"]. "</td><td>" . $row["write_access"]. "</td></tr>";
     }
     echo "</table>";

mysql_close($conn);
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
