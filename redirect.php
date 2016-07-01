<?php
  ob_start();
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
        <div class="content_item" style="height:250pt;">
          <p>
            <?php
              $msg = '';
              if (isset($_GET['action'])) {
              if ($_GET['action'] == 'succeed') {
                $msg = 'Logged in successfully...';
                echo '<p class="lead">' . $msg . '</p>';
                header('Refresh: 2; URL=index.php');
              }
              else if ($_GET['action'] == 'timeover') {
                session_unset();
                session_destroy();
                $msg = 'Inactivity so long, now sign-in again.';
                echo '<p class="lead">' . $msg . '</p>';
                header('Refresh: 2; URL=login.php');
              }
              else if ($_GET['action'] == 'logout') {
                session_unset();
                session_destroy();
                $msg = 'Logged out succesfully...';
                echo '<p class="lead">' . $msg . '</p>';
                header('Refresh: 2; URL=index.php');
              }
              
              else if ($_GET['action'] == 'need_signed_in') {
                session_unset();
                session_destroy();
                $msg = 'You need to be signed in to open this page.';
                echo '<p class="lead">' . $msg . '</p>';
                header('Refresh: 2; URL=login.php');
              }
              else if ($_GET['action'] == 'no_access') {
                $msg = 'You do not have access to this page.';
                echo '<p class="lead">' . $msg . '</p>';
                header('Refresh: 2; URL=index.php');
              }
              
            } else {
              header('Location: index.php');  
            }
          ?>
        </p>
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
<?php
  ob_end_flush();
?>