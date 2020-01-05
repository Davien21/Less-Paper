<?php 
	require 'extra_pages/subscribe-validations.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Less Paper</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./css/extra-responsive.css">
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<script src="./js/jquery-3.4.1.js"></script>
		<script src="./js/bootstrap.js"></script>
	</head>
	<body class="bg-gradient">
		<nav class="navbar navbar-light navbar-expand-xl bg-white">
			<div class="container">
				<a href="./index.php" class="navbar-brand" >
					<span class="brand-span">
						<span class="text-orange-2">LESS</span>
						<span class="">PAPER</span>
					</span>
				</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#nav-menu_div" id="toggle-btn">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
	  			<div class="collapse navbar-collapse text-center" id="nav-menu_div">
	  				<ul class="navbar-nav ml-auto">
	  					<li class="nav-item active ">
	  						<a href="./index.php" class="nav-link ">Home</a>
	  					</li>
	  					<li class="nav-item ">
	  						<a href="#" class="nav-link" >Payment Options</a>
	  					</li>
	  					<li class="nav-item ">
	  						<a href="#" class="nav-link">Learn to use our App</a>
	  					</li>
	  					<li class="nav-item ">
	  						<a href="#" class="nav-link">Find out More about us</a>
	  					</li>
	  				</ul>
	  			</div>
			</div>
		</nav>
		<main>
			<section id="login-section">
				<div class="container">
					<div class="row my-5">
						<div class="mx-auto mt-1 col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 bg-white rounded activity-box px-4 px-sm-5 py-3">
							<div class=" welcome-text">Subscribe to
								<div class="brand-span">
									<span class="text-orange-2">LESS</span>
									<span class="">PAPER</span>
								</div>
							</div>
							<form action="" method="post">
								<!-- <h5 class="mt-1 text-blue2">Please Fill this form</h5> -->
								<!-- <hr class="mt-0"> -->
								<div class="form-group  font-weight-bold ">

									<div class="mt-3 mb-2">
										<label class="d-block pt-1">Email Address:</label>
										<input type="text" class="" name="email" value="<?=$email?>">
										<span class="errTag"><?=$emailerr?></span>

									</div>
									<div class="mb-2">
										<div class="flex">
											<label class="d-block">Password:</label>
											<!-- <img src="./css/eye-solid.svg" height="20" width="20" class="ml-auto"> -->
										</div>
										<input type="password" class="" name="pass">
									</div>
									<div class="">
										<div class="flex">
											<label class="d-block">Confirm Password:</label>
											<!-- <img src="./css/eye-solid.svg" height="20" width="20" class="ml-auto" style="opacity: 0.2"> -->
										</div>
										<input type="password" class="" name="confirm-pass">
										<span class="errTag"><?=$pass_err?></span>

									</div>
								</div>
								<div class="mb-1 mt-2 ">
									<button class="col-12 btn btn-block border-0 btn-orange-2 blue-btns" name="subscribe-btn">Subscribe</button>
								</div>
								<p class=" mt-2 ro">
									<span class="ml-aut">Need any help?</span>
									<a href="" class="text-orange-2 d-inline-block ">
										See our demo videos
									</a>
								<p>
							</form>
							
						
							
							
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="./js/subscribe.js"></script>
	</body>
</html>