<?php
	require_once( "includes/functions.php" );
	session_name("insecureWebsite");
	session_start();
	$_SESSION = array();
	if ( isset($_COOKIE[session_name()] ) ) {
		setcookie( session_name(), '', time()-42000, '/' );
	}

	session_unset();
	session_destroy();
	redirect_to( "index.php" );