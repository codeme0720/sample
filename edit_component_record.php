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
          <h2>Edit Entry</h2>
            <p>Enter the data below regarding the flight entry you what to edit</p>
            <form action="utility.php" method="post">

            	<div>
            	<div style="width:150px; display:inline-block"><p>Component Name</p></div>
            	<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="component_name" value="<?php echo $_POST['component_name']; ?>" required/></p></div>
            	</div>

            	<div>
            	<div style="width:150px; display:inline-block"><p>Component Part No.</p></div>
            	<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="part_no" value="<?php echo $_POST['part_no']; ?>" required/></p></div>
            	</div>

            	<div>
	            <div style="width:150px; display:inline-block"><p>Alternate Part No.</p></div>
				<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="alternate_part_no" value="<?php echo $_POST['alternate_part_no']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Fin No.</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="fin_no" value="<?php echo $_POST['fin_no']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Effectivity</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="effectivity" value="<?php echo $_POST['effectivity']; ?>"/></p></div>
				</div>

	            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="update_component_record_submit" value="Update" /></p></div>
	        </form>
		</div><!--close content_item-->
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
