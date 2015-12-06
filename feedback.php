<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php //find_selected_page(); ?>
<?php include("includes/header.php"); ?>

<?php
	$query = "SELECT * FROM feedback";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);

?>

<!--feedback-->
	<section class="feedback" id="feedback">
	<div class="container w960">
		<div class="heading">
			<img class="dividerline" src="img/sep.png" alt="">
			<h2>Users Say</h2>
			<img class="dividerline" src="img/sep.png" alt="">

			<h3>
				<?php 
					if ($num_rows >= 1)
					{
						echo "Check out what our users says below. And provide us with your feedback too.";
					} else {
						echo "There are currently no feedbacks to be displayed. Post your feedback below.";
					}
				?>
			</h3>

		</div>
		<div class="row">

		
		<?php 
			// displays user feedback
			for($i = 0; $i < $num_rows; $i++)
			{
				$row = mysql_fetch_array($result);
				$name =  $row['name'];
				$message =  $row['message'];
				$email =  $row['email'];

				echo "<blockquote>$message<cite>$name<br/>$email</cite></blockquote>";
			}

		?>

		<?php 
			if ($_GET['feedback'])
			{
				$first = $_GET['feedback'];
				echo "<blockquote>$first</blockquote>";
				//echo $message;
			}

		?>
		
		</div>
	</div>
	</section>
	
	<!--feedback-->
	<section class="contact" id="contact">
	<div class="container">
		<div class="heading">
				<img class="dividerline" src="img/sep.png" alt="">
				<h2>Provide Feedback</h2>
				<img class="dividerline" src="img/sep.png" alt="">
				<h3>Help us understand how we can make your experience in this site better by providing your valuable feedback. Use the form below to send your message up to us.</h3>
		</div>
	</div>
	 <div class="container w960">
      <div class="row">
		<div class="done">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Your message has been sent. Thank you!
			</div>
		</div>
       <form method="get" action="new_feedback.php" id="contactform">
          <input name="name" type="text" class="contact col-md-6" placeholder="Your Name *" required>
          <input name="email" type="email" class="contact noMarr col-md-6" placeholder="E-mail address *" required>
          <textarea name="comment" class="contact col-md-12" placeholder="Message *" required></textarea>
          <input type="submit" id="submit" class="contact submit" value="Send message">
        </form>
      </div>
    </div>
	</section>

<?php require("includes/footer.php"); ?>