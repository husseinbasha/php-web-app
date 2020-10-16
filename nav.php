<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #121212;">
	<a class="navbar-brand">

		<i class="fas fa-brain"></i> FEEDIT
	</a>

	<button class="navbar-toggler d-lg-none " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-navicon" aria-hidden="true"></i></button>
	<div class="collapse navbar-collapse" id="collapsibleNavId">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="landing.php">Home </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="allArticles.php">Articles</a>
			</li>


			
			
			<!--TODO profile for user route-->
			<?php

			if (isset($_SESSION['ID'])) {

				echo '<li class="nav-item ml-3">
					
						<a class="nav-link   " href="wonerProfile.php"><i class="fas fa-user mr-2  "></i>' . $_SESSION['USERNAME'] . ' </a>	
						
						</li>
						';
			}

			?>

		</ul>


		<!-- <form class="nav-form">
				
				<div class="input-group ">
			
				<input class="form-control bg-light " type="text" placeholder="Search">
				<div class="input-group-btn bg-dark">
				<button class="btn btn-dark  " type="submit"><i class="fa fa-search" aria-hidden="true"></i></i>
				</button>
				</div>
				</div>
			</form> -->
		<?php
		if (!isset($_SESSION['ID'])) {
			echo '<ul><li class="nav-item">
					
						<a class="nav-link btn-sm btn-success ml-2 rounded" href="includes/signUp.inc.php">  Signup </a>	
						
						</li></ul>';
		} else {
			echo 		'<ul>
						<li class="nav-item">
					
						<a class="nav-link btn-sm btn-dark ml-2 rounded" href="includes/logout.inc.php"> Logout </a>	
						
						</li></ul>';
		}
echo'
	</div>
</nav>

<script src="js/nav.js">
	
</script>';
?>