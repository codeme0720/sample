<?php
	if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
		if(!$_SESSION['read_access'])
		{
			header('Location: redirect.php?action=no_access');
		}
	} 
?>