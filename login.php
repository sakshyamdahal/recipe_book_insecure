<?php require_once( "includes/session.php" ); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php if (logged_in()) { redirect_to("index.php");} ?>

<?php include("includes/header.php"); ?>
<div id="login-form">

	<input type="radio" checked id="login" name="switch" class="hide">
	<input type="radio" id="signup" name="switch" class="hide">

	<div>
	<ul class="form-header">
	<li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
	<li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
	</ul>
	</div>

	<div class="section-out">
	<section class="login-section">
	<div class="login">
	<form action="user_login.php" method="post">
	<ul class="ul-list">
	<li><input type="text" name="email" required class="input" placeholder="Your Username" required/><span class="icon"><i class="fa fa-user"></i></span></li>
	<li><input type="password" name="password" required class="input" placeholder="Password" required/><span class="icon"><i class="fa fa-lock"></i></span></li>
	<li><input type="submit" name="submit" value="SIGN IN" class="btn"></li>
	</ul>
	</form>
	</div>

	
	</section>

	<section class="signup-section">
	<div class="login">
	<form method="post" action="new_user.php">
	<ul class="ul-list">
	<li><input name="name" type="text" required class="input" placeholder="Your Name"/><span class="icon"><i class="fa fa-user"></i></span></li>
	<li><input name="email" type="text" required class="input" placeholder="Your Username"/><span class="icon"><i class="fa fa-user"></i></span></li>
	<li><input name="password" type="password" required class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
	<li><input type="checkbox" id="check1"> <label for="check1">I accept terms and conditions</label></li>
	<li><input type="submit" name="submit" value="SIGN UP" class="btn"></li>
	</ul>
	</form>
	</div>

	
	</section>
	</div>

</div>




<?php require("includes/footer.php"); ?>