<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	$recipe_id = $_GET['recipe_id'];
	$token = urldecode($_GET['token']);
	$token = str_replace(" ", "+",$token);
	$csrf = $_SESSION['csrfToken'];
	$user_id = $_SESSION['user_id'];
	if ($token === $csrf) {
		$query = "INSERT INTO user_recipe (user_id, recipe_id) VALUES ( '{$user_id}', '{$recipe_id}')";
		if ( mysql_query( $query, $connection ) ) {
			redirect_to( "index.php"); } else {
				echo "Sorry couldn't process your request. Try again later.";
			}
	} else {
		echo "Someone is trying the CSRF attack on you. But don't worry you are secure :)";
	}

?>