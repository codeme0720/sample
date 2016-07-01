<?php
	if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
		if(!$_SESSION['write_access'])
		{
			header('Location: redirect.php?action=no_access');
		}
	} 
?>