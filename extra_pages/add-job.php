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
		<div class="display-modal-body w-100 h-100 dark-filter d-none">
			<div class="">
				<div id="display-modal" class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-7 mx-auto mt-5 bg-white rounded modal-box-shadow">
					<div class="p-2">
						<div class=" px-0 pr-sm-2 col-12 flex pb-1 border-bottom flex-column flex-sm-row">
							<h3 id="header-record-page" class="p-0 m-0 col-auto">
								<span class="d-none d-sm-inline-block">Your</span> 
								<span class="section_name">Jobs</span>
							</h3>
							<h4 id="confirm-record-tag" class="p-0 m-0 col-auto">
								<span>Confirm</span>
								<span class="d-inline-block section_name">Jobs</span>
								<form class="d-inline-block ml-2 confirm-btn mb-0" action="" method="post">
									<button class="btn btn-outline-success" name="confirm-jobs">Confirm</button>
								</form>
									
							</h4>
							<div id="edit-ops-div" class="col-12 col-sm-auto mx-auto my-2 mt-sm-0">
								<button class="btn btn-outline-info edit-records-btn  d-inline-block">
									<span>Edit Data</span>
								</button>
								<button class="d-none btn btn-outline-success save-changes-btn ">
									<span class="">Save Changes</span>
								</button>
							</div>
							<span class="modal-x rounded ">X</span>
						</div>
						<div id="record-output-table" class="table-responsive stable-height">
							<table class="table no-word-wrap all-records table-hover table-condensed">
								<thead class="relative">
										<tr class="tHead-row">
											<th class="tHead-column-top">
												S/N
											</th>
											<th class="tHead-column-top">
												Job Title
											</th>
											<th class="tHead-column-top">
												Job Type
											</th>
										</tr>
									
								</thead>
									<tbody id="record-output" class=" pb-3 pb-sm-4 record-output">
									
									</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
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
			<section id="add-jobs-section">
				<div class="container pt-2">
					<div class="row mt-3 justify-content-md-center  thanks-note">
						<div class="mx-auto col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 flex rounded material-box py-1 alert-navy-blue pb-0 mb-0 alert-dange relative">
							<span class=" ml-xl-4 box-header-text ">
								<span>Jobs</span>
								<span class="d-none d-sm-inline-block">in Your Organisation:</span>
							</span>
							<span class="record-counter rounded">?</span>
							<span class="ml-auto close-x mt-1 absolute text-white px-2 rounded">X</span>
						</div>
					</div>
					<div class="row mb-5 ">
						<div class="mx-auto col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4 bg-white rounded activity-box px-4 px-sm-5 py-3">
							<section id="job-category-div" class="">
								<div class=" welcome-text flex">
									<span>Add All Job types</span>
									<div class="ml-auto m-0">
										<button class="btn  ml-auto btn-success final-confirm" name="go_to_dashboard">Next</button>
									</div>
								</div>
								<form action="" method="post" class="mt-2 mb-0 font-weight-bold">
									<div class="mb-2">
										<label class="d-block pt-1">Job Title:</label>
										<input type="text" name="job-name" class="form-contrl" placeholder="E.g Accountant or Lecturer" value="<?=$job_name?>">
										<span class="errTag"><?=$job_name_err?></span>
									</div>
									<div class="">
										<label class="d-block pt-1">Type of Work:</label>
										<select class="pt-1 form-contrl" name="job-type" >
											<option disabled selected >--Select a Job Type--</option>
											<option>Office Worker</option>
											<option>Non-Office Worker</option>
										</select>
										<span class="errTag d-block"><?=$job_type_err?></span>
									</div>
									<div class="mb-1 mt-3">
										<button class="col-12 btn btn-block btn-orange-2 blue-btns" name="add-job">Add This Job</button>
									</div>
									
								</form>
							</section>
							
							<p class="mt-0 px-2">
								<span>To see what you've added</span>
								<span id="display-modal-btn" class="text-orange-2 d-inline-block ml-2">click here</span>
							</p>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="../js/db-create.js"></script>
	</body>
</html>