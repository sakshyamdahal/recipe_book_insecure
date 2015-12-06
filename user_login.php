<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	if ( logged_in() ) {
		redirect_to( "index.php" );
	}
	
	// Start form processing
	if ( isset( $_POST['submit'] ) ) {
		
		$email = trim( mysql_prep( $_POST['email'] ) );
		$password = trim( mysql_prep( $_POST['password'] ) );
		$hashed_password = sha1( $password );
		
			$query = "SELECT * FROM user ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND password = '{$hashed_password}' ";
			$result_set = mysql_query( $query, $connection );
			//confirm_query( $result_set );
			if ( mysql_num_rows( $result_set ) == 1 ) {
				$found_user = mysql_fetch_array( $result_set );
				$_SESSION['user_id'] = $found_user['user_id'];
				$_SESSION['name'] = $found_user['name'];
				$_SESSION['csrfToken']= base64_encode( openssl_random_pseudo_bytes(32));
				$_SESSION['message'] = "<div class=\"alert alert-success\" role=\"alert\">Welcome " . $found_user['name'] . " </div>";
				redirect_to( "index.php" );
			} else {
				$message = "The user information you provided was incorrect.";
				echo "$message";
			}
	}
?>
