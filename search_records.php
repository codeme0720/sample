<?php
    include 'includes/headers.php';
    include 'includes/login_check.php';
    include 'includes/read_constraint.php';
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
	<div id="site_content">
      <div id="content">
        <div class="content_item">
          <h2>Search Records</h2>
          <p>Enter the data below regarding the flight record you want to search</p>

          <form action="search_result.php" method="post">

            <div>
              <div style="width:150px; display:inline-block"><p>Aircraft Regn. No.</p></div>
              <div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="aircraft_regno" value=""/></p></div>
            </div>

            <div>
              <div style="width:150px; display:inline-block"><p>Flight Date</p></div>
              <div style="width:140px; display:inline-block"><p><input class="contact" type="date" name="entry_date_from" value=""/></p></div> -
              <div style="width:140px; display:inline-block"><p><input class="contact" type="date" name="entry_date_to" value=""/></p></div>
            </div>

            <div>
              <div style="width:150px; display:inline-block"><p>Status</p></div>
              <div style="width:430px; display:inline-block">
                <p><select name="status">
                    <option value=""></option>
                    <option value="snag">Snag</option>
                    <option value="cf">C/F</option>
                    <option value="delay">Delay</option>
                    <option value="rampReturn">Ramp Return</option>
                    <option value="aog">AOG</option>
                    <option value="ifsd">IFSD</option>
                    <option value="refueling">Refueling</option>
                    <option value="airTurnback">Air Turnback</option>
                    <option value="incident">Incident</option>
                    <option value="majorMaint">Major Maintainence</option>
                    <option value="diversion">Diversion</option>
                  </select></p>
              </div>
            </div>

            <div>
              <div style="width:150px; display:inline-block"><p>ATA Code</p></div>
              <div style="width:430px; display:inline-block"><p><input class="contact" type="number" min="0" max="100" name="ata_code" value="" /></p></div>
            </div>

            <div>
              <div style="width:150px; display:inline-block"><p>C/F Expiry date</p></div>
              <div style="width:430px; display:inline-block"><p><input class="contact" type="date" name="cf_expiry_date" value="" /></p></div>
            </div>

            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="search_submit" value="Submit" /></p></div>
          </form>

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
