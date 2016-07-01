<div id="login_area">
  <?php  
  if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) 
  {
    $inactive = 60 * 60 * 1;
    if(time() - $_SESSION['timeout'] < $inactive) 
    {
        $_SESSION['timeout'] = time(); 
        echo '<div>Hello, ' . $_SESSION['username'] . '</div>';
      echo '<div align="right"><a href="redirect.php?action=logout">Logout</a></div>';
    }
    else if((time() - $_SESSION['timeout'] > $inactive))
    {
      $_SESSION['valid'] = false; 
      header('Location: redirect.php?action=timeover');
    } 
  } 
 else 
  {
    echo '<a style="vertical-align: -30px;" href="login.php">Login</a>';
  }

  ?>
</div>