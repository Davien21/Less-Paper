<?php
	require 'db-create-validations.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Less Paper | Department</title>
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
			<div class="container-fluid px-sm-">
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
	  			<form action="log-out.php" class="d-none d-sm-flex log-out-form">
	  				<button class="btn btn-block btn-outline-danger">Log Out</button>
	  			</form>
			</div>
		</nav>
		<main>
			<section id="departments-check" class="<?=$dept_check_display ?>">
				<div class="container">
					<div class="row my-5">
						<div class="mx-auto col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 ">
							<div class="d-block rounded material-box py-1 alert-navy-blue ">
								<span class="ml-3 ml-sm-4 dept-check-header-text" >Let's Get to Know You</span>
								<span class="ml-auto close-x mt-1 absolute text-white px-2 rounded">X</span>
							</div>
							<div class="confirmation-div bg-white rounded activity-box px-3 px-sm-4 py-4 py-sm-3">
								<div class=" welcome-text">
									Does Your Organisation <span class="d-inline-block">Have Any Departments?</span> 
								</div>
								<div class="mb-1 mt-4" action="">
									<div class="row">
										<form class="col-6" action="" method="post">
											<button class="btn btn-block btn-orange-2 blue-btns" name="yes-dept">Yes</button>
										</form>
										<form class="col" action="" method="post">
											<button class=" btn btn-block btn-orange-2 blue-btns" name="no-dept">No</button>
										</form>
									</div>
								</div>
								<p class=" mt-2 ro">
									<span class="ml-aut">Need any help?</span>
									<a href="" class="text-orange-2 d-inline-block ">
										See our demo videos
									</a>
								<p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="../js/db-create.js"></script>
	</body>
</html>