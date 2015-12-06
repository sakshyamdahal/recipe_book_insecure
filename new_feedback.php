<?php
require_once( "includes/session.php" );
require_once( "includes/connection.php" );
require_once( "includes/functions.php" );


$name = $_GET['name'];
$email  = $_GET['email'];
$comment   = $_GET['comment'];
$query = "INSERT INTO feedback (name, email, message) VALUES ('";
$query .= $name."','";
$query .= $email."','";
$query .= $comment."');";
if ( mysql_query( $query) ) {
	redirect_to( "feedback.php");
} else {
	// Display error message
	echo "<p>Feedback creation failed.</p>";
	echo "<p>" . mysql_error() . "</p>";
	echo "$query";
}

mysql_close( $connection );