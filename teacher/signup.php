<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>Teachers Signup</title>
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
							<h3><label for="Middle name ">Middle name</label></h3>
		 <input class="form-control  form-control-lg " type="text" name="mname" maxlength="30">
	</div>
	<div class="form-group ">
							<h3><label for="Last name ">Last name  </label></h3>
		 <input class="form-control  form-control-lg " type="text" name="lname" maxlength="30" required>
</div>
<div class="form-group ">
							<h3><label for="E-mail">E-mail </label></h3>
		  <input class="form-control  form-control-lg " type="email" name="email" maxlength="30" required>
	</div>
	<div class="form-group ">
							<h3><label for="Password ">Password </label></h3>
		 <input class="form-control  form-control-lg " type="password" name="pwd" maxlength="30" required>
	</div>
</div>
<div class="form col-xs-12 col-md-12 col-lg-6 w-100 responsive ">
	<div class="form-group ">
							<h3><label for="Confirm Password">Confirm Password </label></h3>
		  <input class="form-control  form-control-lg " type="password" name="conpwd" maxlength="30" required>
	</div>
	<div class="form-group ">
							<h3><label for="Subject ">Subject  </label></h3>
		 <select class="form-control  form-control-lg " name="subject">
			<option selected disabled>Select your Main Subject</option>
			<?php 
				include '../includes/dbh.inc.php';
				$sqlSubject = "SELECT * FROM subject";
				$sqlSubjectQuery = mysqli_query($conn, $sqlSubject);
				while ($row = mysqli_fetch_assoc($sqlSubjectQuery)) {
				echo "<option value='".$row['subjectId']."'>".$row['subject']."</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group ">
							<h3><label for="Grade ">Grade </label></h3>
		 <select class="form-control  form-control-lg " name="grade">
			<option selected disabled>Select the grade of your advisory or any of your class</option>
			<?php
				$sqlGrade = "SELECT * FROM grade";
				$sqlGradeQuery = mysqli_query($conn, $sqlGrade);
				while ($row = mysqli_fetch_assoc($sqlGradeQuery)) {
				echo "<option value='".$row['gradeId']."'>".$row['grade']."</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group ">
							<h3><label for="Section ">Section </label></h3>
		 <select class="form-control  form-control-lg " name="section">
			<option selected disabled>Select the section of your advisory or any of your class</option>
			<?php 
				$sqlSection = "SELECT * FROM section";
				$sqlSectionQuery = mysqli_query($conn, $sqlSection);
				while ($row = mysqli_fetch_assoc($sqlSectionQuery)) {
				echo "<option value='".$row['sectionId']."'>".$row['section']."</option>";
			}
			?>
		</select>
	</div>
		<button class="btn btn-primary btn-lg " type="submit" name="teacherSignup">Sign Up</button>
	</form>
	<p>Already have an account?<a href="portal.php">Click here</a></p>
</div>
</div>
</div>
</body>
</html>