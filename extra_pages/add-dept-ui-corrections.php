<?php
	// require 'db-create-validations.php';

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
			<div id="content-section">
				<div class="container pt-4">
					<div class="row mb-5 rel">
						<div>
							
						</div>
						<section id="add-departments col-4 mx-auto">
							<div class="input-modal  ">
								<div class="d-block rounded material-box py-1 alert-navy-blue ">
									<span class="ml-3 ml-sm-4 dept-check-header-text" >Let's Get to Know You</span>
									<span class="ml-auto close-x mt-1 absolute text-white px-2 rounded">X</span>
								</div>
									<div class="departments-div  bg-white rounded activity-box px-3 px-sm-4 py-4 py-sm-3">
										<div class=" welcome-text flex justify-content-between px-2">
											<span>Add Departments</span>
											 	<form class="" action="add-job.php" method="post">
													<button class="btn px-3  ml-auto btn-success" name="go-to-jobs">Next</button>
												</form>
											
										</div>
										<form class="mt-3 font-weight-bold px-2"  action="" method="post">
											<div class="">
												<label class="d-block pt-1">Name of Department:</label>
												<input type="text" name="department-name" class="form-contrl mb-2" placeholder="E.g Accounts or Productions">
												<span class="job-name text-dange"></span>
												<span class="job-err"></span>
											</div>
											<div class="">
												<label class="d-block pt-1">Department Head:</label>
												<input type="text" name="dept-head-title" class="form-contrl mb-2" placeholder="E.g General Accountant or Manager">
												<span class="job-name text-dange"></span>
												<span class="job-err"></span>
											</div>
											<div class="mb-1 mt-2">
												<button class="col-12 btn btn-block btn-orange-2 blue-btns" name="add-new-dept">Add Department</button>
											</div>
										</form>
										<p class=" mt-2 px-2">
											<span class="ml-aut">Need any help?</span>
											<a href="" class="text-orange-2 d-inline-block ">
												See our demo videos
											</a>
										<p>
									</div>
								</div>
						</section>
						
						<div class="job-types-container absolute col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
							drrrr
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="../js/db-create.js"></script>
	</body>
</html>