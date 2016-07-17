<?php
  include 'includes/db_utils.php';
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
	<div id="site_content">
      <div id="content">
        <div class="content_item">
          <h2> Query Processed</h2>
            <?php
                $errorString;
	    $conn = connectToDB($errorString);
	    if (!$conn)
	    {
	      	echo $errorString;
	   		return;
	    }
$username = $_POST['username'];
$password = $_POST['password'];
$read = $_POST['read_access'];
$write = $_POST['write_access'];


$sql = "INSERT INTO `credentials`(`username`, `password`, `read_access`, `write_access`) VALUES ('$username','$password','$read','$write')";

$q=mysql_query($sql,$conn);
 if(! $q )
			    {
			      echo "User Already Exists";
                    echo "<script type='text/javascript'>  window.location='admin.php'; </script>";			    
                }
else 
{
    echo "New record created successfully";
                    echo "<script type='text/javascript'>  window.location='admin.php'; </script>";			    
} 

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
