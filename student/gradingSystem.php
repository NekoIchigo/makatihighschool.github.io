<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<title>Grading System</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/new.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/datatables.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="page-header col-xs-12 col-md-12 col-lg-12 w-100" style="text-align: center;">
	<?php 
					session_start();
					include '../includes/dbh.inc.php';

					echo "<h1>".$_SESSION['s_fname']." ".$_SESSION['s_mname']." ".$_SESSION['s_lname']."</h1>";

					?>
				</div>
	<form action="../includes/logOut.inc.php" method="POST">
		<button class="close close-primary btn-lg" type="submit" name="logout">Log out</button>
	<button class="btn btn-success" type="button" name="editAcc"  data-toggle="modal" data-target="#update">Edit Account</button>
	</form>
	<br>
	<table id="table"class="table table-bordered table-hover text-justify text-wrap table-striped" >
	<thead class="thead-dark">
		<tr>
			<th>Learning Areas</th>
			<th>1st Quarter</th>
			<th>2nd Quarter</th>
			<th>3rd Quarter</th>
			<th>4th Quarter</th>
			<th>Final Grade</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$sqlSubject = "SELECT * FROM subject";
			$sqlSubjectQuery = mysqli_query($conn, $sqlSubject);
			while ($row = mysqli_fetch_assoc($sqlSubjectQuery)) {
				$sub_id = $row['subjectId'];
				$s_id = $_SESSION['s_id'];
				echo "<tr>
						<td>".$row['subject']."</td>";
				$slctGrd = "SELECT * FROM grades WHERE subId = '$sub_id' AND s_Id = '$s_id';";
				$queryGrd = mysqli_query($conn,$slctGrd);
				$grdResult = mysqli_num_rows($queryGrd);
				if ($grdResult > 0) {
					$grd = mysqli_fetch_assoc($queryGrd);
					echo "<td>".$grd['1st']."</td>
						<td>".$grd['2nd']."</td>
						<td>".$grd['3rd']."</td>
						<td>".$grd['4th']."</td>
						<td>".$grd['f_grd']."</td>";
				}else{
					echo "<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>";
				}
			}
		?>
		</tbody>
	</table>
</div>


<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12 col-lg-12 col-md-12">

											<div class="jumbotron col-xs-12 col-lg-12 col-md-12 w-100">
												<h3 style="text-align: center">Current Info</h3>
												<br>
												<div class="row">
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Firstname:</h6><p><?php echo $_SESSION['s_fname']; ?></p></div>
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Middlename:</h6><p> <?php echo $_SESSION['s_mname']; ?></p></div>
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Lastname:</h6><p> <?php echo $_SESSION['s_lname']; ?></p></div>
													<div class="col-xs-12 col-lg-3 col-md-12"><h6>E-mail:</h6><p> <?php echo $_SESSION['s_email']; ?></p></div>
													<div class="col-xs-12 col-lg-3 col-md-12"><h6>Password:</h6><p> <?php echo $_SESSION['s_pwd']; ?></p></div>
													<div class="col-xs-12 col-lg-12 col-md-12">
														<p class="new" ><a  href="#update1">update</a></p>

													</div>




												</div>
											</div>
											

											<form  class="update" action="../includes/edit.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data" id="update1">
												<div class="jumbotron col-xs-12 col-lg-12 col-md-12 w-100">
													<h3>New Info</h3>
													<p style="color: blue;">Note* Don\'t fill up the columns you don`t want to change.</p>
													<h3><label for="Firstname ">Firstname</label></h3>
													<input class="form-control  form-control-lg " type="text" name="fname" >

													<h3><label for="Middlename ">Middlename</label></h3>
													<input class="form-control  form-control-lg " type="text" name="mname" >

													<h3><label for="Lastname ">Lastname</label></h3>
													<input class="form-control  form-control-lg " type="text" name="lname" >

													<h3><label for="Email ">Email</label></h3>
													<input class="form-control  form-control-lg " type="email" name="email" >

													<h3><label for="Password ">Password</label></h3>
													<input class="form-control  form-control-lg " type="text" name="pwd" maxlength="10" >

													<h3><label for="Confirm Password ">Confirm Password</label></h3>
													<input class="form-control  form-control-lg " type="text" name="conpwd" maxlength="10" >
													<br>	
<button class="btn btn-primary btn-lg" type="submit" name="studentEdit">Update</button>
</div>
										</form>





													<?php

													$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

													if (strpos($fullUrl, "edit=empty") == true) {
														echo "<script>alert('You haven\'t input anything!');</script>";
														exit();
													} elseif (strpos($fullUrl, "email=taken") == true) {
														echo "<script>alert('Email is already taken!');</script>";
														exit();
													}elseif (strpos($fullUrl, "user=taken") == true) {
														echo "<script>alert('Username is already taken!');</script>";
														exit();
													}elseif (strpos($fullUrl, "pwd=notmatch") == true) {
														echo "<script>alert('Password and Confirm Password are not match!');</script>";
														exit();
													}

													?>
												</div>
											</div>
										</div>
</div>
</div>

			<script src="../bootstrap/jquery/popper.min.js"></script>
			<script src="../bootstrap/jquery/jquery-3.3.1.min.js"></script>
			<script src="../bootstrap/jquery/datatables.min.js"></script> 
			<script src="../bootstrap/js/bootstrap.min.js"></script>

			<script type="text/javascript">
				$(document).ready(function() {
					$('#table').DataTable();
					
				});
			</script>
			<script>
				$('.new ').click(function(){
					$('.update').animate({height: "toggle", opacity: "toggle"}, "slow");    
				});
			</script>
</body>
</html>