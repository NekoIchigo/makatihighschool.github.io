<?php
	session_start();
	include '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../teacher/gradingSystem.php" class="btn btn-close" type="close" >Back</a>
	

		<h3>Current Info</h3>
		<p>Firstname: <?php echo $_SESSION['t_fname']; ?></p>
		<p>Lastname: <?php echo $_SESSION['t_mname']; ?></p>
		<p>Username: <?php echo $_SESSION['t_lname']; ?></p>
		<p>E-mail: <?php echo $_SESSION['t_email']; ?></p>
		<p>Password: <?php echo $_SESSION['t_pwd']; ?></p>

	<form action="../includes/edit.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">
				<h3>New Info</h3>
				<p>Note* Don\'t fill up the columns you don`t want to change.</p>
				Firstname : <input type="text" name="fname" ><br>
				Middlename : <input type="text" name="mname" ><br>
				Lastname : <input type="text" name="lname" ><br>
				E-mail : <input type="email" name="email" ><br>
				Password : <input type="password" name="pwd" maxlength="10" ><br>
				Confirm Password : <input type="password" name="conpwd" maxlength="10" ><br>
				<button type="submit" name="teacherEdit">Update</button>
			</form></div>

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


</body>
</html>
	