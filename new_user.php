<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	// Start form processing	
	if ( isset( $_POST['submit'] ) ) {
		$name = trim( mysql_prep( $_POST['name'] ) );
		$email = trim( mysql_prep( $_POST['email'] ) );
		$password = trim( mysql_prep( $_POST['password'] ) );
		$hashed_password = sha1( $password );

		$query = "INSERT INTO user (name, email, password) VALUES ( '{$name}', '{$email}', '{$hashed_password}')";
		if ( mysql_query( $query, $connection ) ) {
			$_SESSION['user_id'] = mysql_insert_id();
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			$_SESSION['message'] = "<div class=\"alert alert-success\" role=\"alert\">Welcome " . $name . " </div>";
			redirect_to( "index.php");
		} else {
		// Display error message
		echo "<p>User creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
		echo "$query";
		}
	} else {
		echo "not working";
		$username = "";
		$password = "";
	}
?>

