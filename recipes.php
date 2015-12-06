<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php echo $_SESSION['message']?>

<?php
	$query = "SELECT * FROM recipe";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$recipe_arr = array();
?>


	<!--gallery-->
	<section class="gallery" id="gallery">
		<div class="container">
			<div class="heading text-center">
				<img class="dividerline" src="img/sep.png" alt="">
				<h2>Recipes Gallery</h2>
				<img class="dividerline" src="img/sep.png" alt="">
			</div>
			
			<div id="grid-gallery" class="grid-gallery">

					<section class="grid-wrap">
						<ul class="grid">
							<li class="grid-sizer"></li><!-- for Masonry column width -->	

							<?php 
								// displays user feedback
								for($i = 0; $i < $num_rows; $i++)
								{
									$row = mysql_fetch_array($result);
									array_push($recipe_arr, $row);
									$image_url =  htmlspecialchars($row['img_url'], ENT_QUOTES, 'UTF-8');
									$title =  htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
									$description =  htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
									echo "<li><figure><img src=$image_url alt=\"\"/><figcaption><h3>$title</h3><p>$description</p><br/><button class=\"btn\">View recipe</button></figcaption></figure></li>";

								}

							?>
						
						</ul>
					</section><!-- // end small images -->

					
					<section class="slideshow">
						<ul>

							<?php 
								for($i = 0; $i < $num_rows; $i++)
								{
									$row = $recipe_arr[$i];
									$recipe_id =  htmlspecialchars($row['recipe_id'], ENT_QUOTES, 'UTF-8');
									$image_url =  htmlspecialchars($row['img_url'], ENT_QUOTES, 'UTF-8');
									$title =  htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
									$description =  htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
									$token = urlencode($_SESSION['csrfToken']);
									echo "<li><figure><img src=$image_url alt=\"\"/><figcaption><h3>$title</h3><p>$description</p><button class=\"btn\">
									<a href=add_recipe.php?recipe_id=$recipe_id>Add recipe</a></button></figcaption></figure></li>";
								}

							?>
							
						</ul>
						<nav>
							<span class="icon nav-prev"></span>
							<span class="icon nav-next"></span>
							<span class="icon nav-close"></span>
						</nav>
						<div class="info-keys icon">Navigate with arrow keys</div>
					</section><!-- // end slideshow -->
					
				</div><!-- // grid-gallery -->
			</div>
	</section>

<?php require("includes/footer.php"); ?>
	