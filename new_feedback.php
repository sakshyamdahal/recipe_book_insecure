<?php
require_once( "includes/session.php" );
require_once( "includes/connection.php" );
require_once( "includes/functions.php" );


$name = mysql_prep( $_POST['name'] );
$email  = mysql_prep( $_POST['email'] );
$comment   = mysql_prep( $_POST['comment'] );
$query = "INSERT INTO feedback (name, email, message) VALUES ( '{$name}', '{$email}', '{$comment}')";
if ( mysql_query( $query, $connection ) ) {
	redirect_to( "feedback.php");
} else {
	// Display error message
	echo "<p>Feedback creation failed.</p>";
	echo "<p>" . mysql_error() . "</p>";
	echo "$query";
}

mysql_close( $connection );