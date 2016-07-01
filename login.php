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
  <script type="text/javascript" src="main.js"></script>
</head>

<body>
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
      
    </div><!--close header-->  
  </div><!--close header_container-->  
  <div id="main">
	<div id="site_content">
      <div id="content">
        <div class="content_item">
          <h2>Login</h2>
          <p>Enter the username and password below</p>
          
          <form action="utility.php" method="post">
            <div>
              <div style="width:150px; display:inline-block"><p>Username</p></div>
              <div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="username" required value="<?php if(isset($_GET['username'])){ echo $_GET['username'];} ?>"/></p></div>
            </div>

            <div>
              <div style="width:150px; display:inline-block"><p>Password</p></div>
              <div style="width:430px; display:inline-block"><p><input class="contact" type="password" name="password" required value=""/></p></div>
            </div>
            <div><p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p></div>

            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="login_submit" value="Submit" /></p></div>
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
