<?php
	require 'db-create-validations.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Less Paper | New Office</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/extra-responsive.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<script src="../js/jquery-3.4.1.js"></script>
		<script src="../js/all.min.js"></script>
		<script src="../js/bootstrap.js"></script>
	</head>	
	<body>
		<nav class="navbar navbar-light navbar-expand-xl bg-white">
			<div class="container-fluid ">
				<a href="../index.php" class="navbar-brand" >
					<span class="brand-span">
						<span class="text-orange-2">LESS</span>
						<span class="">PAPER</span>
					</span>
				</a>
				<button class="navbar-toggler ml-auto mr-3" data-toggle="collapse" data-target="#nav-menu_div" id="toggle-btn">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
	  			<div class="collapse navbar-collapse text-center " id="nav-menu_div">
	  				<ul class="navbar-nav ">
	  					<li class="nav-item active ">
	  						<a href="../index.php" class="nav-link ">Home</a>
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
	  					<li class="nav-item ">
	  						<form action="log-out.php" class="d-flex d-sm-none">
	  							<button class="btn btn-block btn-outline-danger">Log out</button>
	  						</form>
	  					</li>
	  				</ul>
	  			</div>
	  			<form action="log-out.php" class="d-none d-sm-flex log-out-form mb-0">
	  				<button class="btn btn-block btn-outline-danger">Log Out</button>
	  			</form>
			</div>
		</nav>
		<main>
			<section id="office-section">
				<div class="container pt-4">
					<div class="row mt-3 justify-content-md-center thanks-note">
						<div class="mx-auto col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 flex rounded material-box py-1 alert-navy-blue pb-0 mb-0">
							<span class=" ml-xl-4 thank-you-text ">Thank you for subscribing!</span>
							<span class="ml-auto close-x mt-1 absolute text-white px-2 rounded">X</span>
						</div>
					</div>
					<div class="row mb-5 ">
						<div class="mx-auto col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 bg-white rounded activity-box px-4 px-sm-5 py-3">
							<section id="db-name-section" class="<?=$name_section_display  ?>">
								<form action="" method="post">
									<div class=" welcome-text">Create your
										<div class="brand-spa d-inline-block">
											Online <span class="font-weight-norm">Office</span> 
										</div>
									</div>
									<div class="mt-3 font-weight-bold">
										<div class="">
											<label class="d-block pt-1">Name of Organisation:</label>
											<input type="text" name="org-name" class="" placeholder="Name e.g: Google" value="<?=$org_name?>">
											<span class="org-name-err errTag"><?=$org_name_err?></span>
										</div>
										<div class="">
											<label class="d-block pt-1">Head of Organisation:</label>
											<input type="text" name="top-officer" class="" placeholder="What is the title? eg: C.E.O" value="<?=$top_officer?>">
											<span class="top-officer-err errTag"><?=$top_officer_err?></span>
										</div>
										<div class="mb-1 mt-2">
											<button class="col-12 btn btn-block btn-orange-2 blue-btns" name="add-db-name">Next</button>
										</div>
									</div>
								</form>
							</section>
							<p class=" mt-2 ro">
								<span class="ml-aut">Need any help?</span>
								<a href="" class="text-orange-2 d-inline-block ">
									See our demo videos
								</a>
							<p>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="../js/db-create.js"></script>
	</body>
</html>