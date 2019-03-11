<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>Students Signup</title>
	 <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/new.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<a href="../student/portal.php" class="btn btn-close" type="close" >Back</a>
				<div class="page-header col-xs-12 col-md-12 col-lg-12 w-100 responsive" style="text-align: center;">
					<h1>Sign up</h1>
				</div>
				<div class="content col-xs-12 col-md-12 col-lg-12 w-100 responsive">

					<form action="../includes/signup.inc.php" method="POST" autocomplete="off">
						<div class="row">
						<div class="form col-xs-12 col-md-12 col-lg-6 w-100 responsive ">
						<div class="form-group ">
							<h3><label for="firstname">First name </label></h3>
		 <input class="form-control  form-control-lg " type="text" name="fname" maxlength="30" required>
	</div>

	<div class="form-group ">
							<h3><label for="mIddlename">Middle name  </label></h3>
		 <input class="form-control  form-control-lg " type="text" name="mname" maxlength="30">
	</div>
	<div class="form-group ">
							<h3><label for="lastname">Last name </label></h3>
		 <input class="form-control  form-control-lg " type="text" name="lname" maxlength="30" required>
	</div>

	<div class="form-group ">
							<h3><label for="email">E-mail </label></h3>
		  <input class="form-control  form-control-lg " type="email" name="email" maxlength="30" required>
	</div>
	</div>

<div class="form col-xs-12 col-md-12 col-lg-6 w-100 responsive ">
	<div class="form-group ">
							<h3><label for="password">Password  </label></h3>
		 <input class="form-control  form-control-lg " type="password" name="pwd" maxlength="30" required>
	</div>
	<div class="form-group ">
							<h3><label for="confirmpassword">Confirm Password </label></h3>
		  <input class="form-control  form-control-lg " type="password" name="conpwd" maxlength="30" required>
	</div>

	<div class="form-group ">
		<h3><label for="grade">Grade</label></h3>
		  <select class="form-control  form-control-lg " name="grade">
			<option selected disabled>Select your grade</option>
			<?php 
				include '../includes/dbh.inc.php';
				$sqlGrade = "SELECT * FROM grade";
				$sqlGradeQuery = mysqli_query($conn, $sqlGrade);
				while ($row = mysqli_fetch_assoc($sqlGradeQuery)) {
				echo "<option value='".$row['gradeId']."'>".$row['grade']."</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group ">
		<h3><label for="section">Section </label></h3>
		 <select class="form-control  form-control-lg " name="section">
			<option selected disabled>Select your section</option>
			<?php 
				include '../includes/dbh.inc.php';
				$sqlSection = "SELECT * FROM section";
				$sqlSectionQuery = mysqli_query($conn, $sqlSection);
				while ($row = mysqli_fetch_assoc($sqlSectionQuery)) {
				echo "<option value='".$row['sectionId']."'>".$row['section']."</option>";
			}
			?>
		</select>
	</div>
</div>
</div>
		<button class="btn btn-primary btn-lg" type="submit" name="studentSignup">Sign Up</button>

	</form>
	<p>Already have an account?<a href="portal.php">Click here</a></p>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>