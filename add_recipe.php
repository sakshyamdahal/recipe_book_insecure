<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	$recipe_id = $_GET['recipe_id'];
	$user_id = $_SESSION['user_id'];
	
	$query = "INSERT INTO user_recipe (user_id, recipe_id) VALUES ( '{$user_id}', '{$recipe_id}')";
	if ( mysql_query( $query, $connection ) ) {
		$_SESSION['message'] = "<div class=\"alert alert-success\" role=\"alert\">Recipe successfully added.</div>";
		redirect_to( "index.php"); } else {
			echo "Sorry couldn't process your request. Try again later.";
	}

?>