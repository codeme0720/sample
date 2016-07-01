<?php
	if (!isset($_SESSION['valid'])) {
		header('Location: redirect.php?action=need_signed_in');	
	} 
?>