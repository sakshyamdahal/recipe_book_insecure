<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	if ( logged_in() ) {
		redirect_to( "index.php" );
	}
	
	// Start form processing
	if ( isset( $_POST['submit'] ) ) {
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM user where BINARY email='".$email."' and BINARY password='".$password."';";

		$result_set = mysql_query( $query);

			//confirm_query( $result_set );
			if ( mysql_num_rows( $result_set ) != 0 ) {
				$found_user = mysql_fetch_array( $result_set );
				$_SESSION['user_id'] = $found_user['user_id'];
				$_SESSION['name'] = $found_user['name'];
				$_SESSION['message'] = "<div class=\"alert alert-success\" role=\"alert\">Welcome " . $found_user['name'] . " </div>";
				$user_id = $_SESSION['user_id'];
				redirect_to( "index.php?user_id=$user_id");
			} else {
				$message = "The user information you provided was incorrect.";
				echo "$message";
			}
	}
?>
