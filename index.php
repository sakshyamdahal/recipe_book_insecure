<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php if(!logged_in ())
{
?>

<?php include("includes/header.php"); ?>

	<!--header-->
	<header>
	
	<div class="banner row" id="banner">	

		<div class="parallax text-center" style="background-image: url(http://wowthemes.net/demo/leroy/img/dummy1.jpg);">
			<div class="parallax-pattern-overlay">
				<div class="container text-center" style="height:580px;padding-top:170px;">
					<a href="#"><img id="site-title" class=" wow fadeInDown" wow-data-delay="0.0s" wow-data-duration="0.9s" src="img/logo.png" alt="logo"/></a>
					<h2 class="intro wow zoomIn" wow-data-delay="0.4s" wow-data-duration="0.9s">Your Personal Recipe Book</h2>
					<h2 class="intro wow zoomIn" wow-data-delay="0.4s" wow-data-duration="0.9s" style="color:red;">Insecure Site</h2>
				</div>
			</div>
		</div>
	</div>	
	
	</header>
		
	<!--about us-->
	<section class="aboutus" id="aboutus">
	<div class="container">
		<div class="heading text-center">
			<img class="dividerline" src="img/sep.png" alt="">
			<h2>About Personal Recipe Book</h2>
			<img class="dividerline" src="img/sep.png" alt="">
			<h3>Have you ever felt worried that you don't know how and what to cook? Worry no longer use this webapp to save your favourite recipe so that you can always 
			prepare that special meal for your special one. The site is vulnerable to various attacks including sql injection, xss, csrf, ido. So be careful. &#9785; &#9785; &#9785;
			</h3>
		</div>			
	</div>
	</section>
	
	
<?php require("includes/footer.php"); ?>
<?php } else { ?>
	<?php require("personal_recipes.php"); ?>

<?php }	?>
	
