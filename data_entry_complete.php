<?php
    include 'includes/headers.php';
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
</head>

<body onload="document.getElementById('menuEntryDataEntry').className += 'current';">
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
        <div class="content_item" style="height:250pt;">
          <h2>Data Entry</h2>
          <p>
            <?php
              $msg = "";
              if($_GET["status"] == "success")
              {
                $msg = "Operation Successfully submitted";
                if (isset($_GET["cf_sno"]) && $_GET["cf_sno"] != -1)
                  $msg .= "<br>C/F No. = " . $_GET["cf_sno"];
              }
              else if($_GET["status"] == "failure")
              {
                $msg = "Operation not successful";
                if( isset($_GET["error"]))
                  $msg = $msg . "<br>" . $_GET["error"];
              }
              echo $msg;
            ?>
          </p>
        </div>    
      </div><!--close content-->   
	</div><!--close site_content-->
  </div><!--close main-->  
  <div id="footer_container">     
	<div id="footer">
      <footer> <small>&copy; Copyright 2015, MCC Air India</small> </footer>
    </div><!--close footer-->
  </div><!--close footer_container-->   
</body>
</html>
