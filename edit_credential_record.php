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
          <h2>Edit Entry</h2>
            <p>Enter the data below regarding the credentials entry you what to edit</p>
            <form action="utility.php" method="post">

            	<div>
            	<div style="width:150px; display:inline-block"><p>Username</p></div>
            	<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="username" value="<?php echo $_POST['username']; ?>" required/></p></div>
            	</div>

            	<div>
            	<div style="width:150px; display:inline-block"><p>Password</p></div>
            	<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="password" value="<?php echo $_POST['password']; ?>" required/></p></div>
            	</div>

            	<div>
	            <div style="width:150px; display:inline-block"><p>Read Access</p></div>
				<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="read_access" value="<?php echo $_POST['read_access']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Write Access</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="write_access" value="<?php echo $_POST['write_access']; ?>"/></p></div>
				</div>

	            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="update_credential_record_submit" value="Update" /></p></div>
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
