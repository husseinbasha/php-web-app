<!-- NAVIGATION -->
<?php


require 'header.php';
require 'nav.php';

?>
<div class="main-w3layouts wrapper">
	<div class="main-agileinfo">

		<div class="agileits-top">
			
			<form action="includes/login.inc.php" method="post">
			<?php
					if(isset($_GET['error'])){
						echo '<div class="alert alert-danger mr-4" role="alert">
							'.$_GET['error'].'
					  	</div>';
					}
				?>
				<input value="<?php if(isset($_GET['username'])){echo $_GET['username'];}?>" class="text" type="text" name="username" placeholder="Username or Email" required="">
				<div style="margin: 1.3em 0;">
					<input class="text" type="password" name="password" placeholder="Password" required="">
				</div>
				<div class="wthree-text ">
						<label class="anim">
							<input id='btn' type="checkbox" name="checkbox" class="checkbox" >

							<span></span>
							remember me
						</label>
						<div class="clear"> </div>
					</div>

				<input type="submit" value="LOGIN" name="login" style="margin-top: 15px;">
			</form>
			<p>Do you have an Account? <a href="signUp.php"> Sign Up!</a></p>
		</div>
	</div>
	<!-- copyright -->
	
	<!-- animations -->
	<ul class="colorlib-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<script src="js/core.js"></script>

<script src="js/animation.js"></script>
<?php
require 'footer.php';
?>
</body>

</html>