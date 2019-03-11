<?php 

require 'dbh.inc.php';
if (isset($_POST['studentSignup'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$conpwd = mysqli_real_escape_string($conn, $_POST['conpwd']);
	$grade = mysqli_real_escape_string($conn, $_POST['grade']);
	$section = mysqli_real_escape_string($conn, $_POST['section']);

	if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($conpwd)) {
		header("Location: ../student/signup.php?signup=inputEmpty");
		exit();
	}else{
		if (!preg_match("/^[a-z A-Z]*$/", $fname) || !preg_match("/^[a-z A-Z]*$/", $lname) || !preg_match("/^[a-z A-Z]*$/", $mname)) {
			header("Location: ../student/signup.php?input=invalid");

			exit();
		}else{
			$sqlEmailGet = "SELECT email FROM student WHERE email='$email';";
			$sqlEmailQuery = mysqli_query($conn, $sqlEmailGet);
			$sqlEmailResult = mysqli_num_rows($sqlEmailQuery);
			if ($sqlEmailResult == 1) {
				header("Location: ../student/signup.php?email=taken");
				exit();
			}else{
				if ($conpwd != $pwd) {
					header("Location: ../student/signup.php?pwd=notmatch");
					exit();
				}else{
					$hashedPwd = base64_encode($pwd);

					$sql = "INSERT INTO student (fname, mname, lname, email, pwd, grdId, secId) VALUES ('$fname', '$mname', '$lname', '$email', '$hashedPwd', '$grade', '$section');";
					mysqli_query($conn, $sql);
					header("Location: ../student/portal.php?signup=success");
					
					exit();
				}
			}
		}
	}
}elseif (isset($_POST['teacherSignup'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$conpwd = mysqli_real_escape_string($conn, $_POST['conpwd']);
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$grade = mysqli_real_escape_string($conn, $_POST['grade']);
	$section = mysqli_real_escape_string($conn, $_POST['section']);

	if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($conpwd)) {
		header("Location: ../teacher/signup.php?signup=inputEmpty");
		exit();
	}else{
		if (!preg_match("/^[a-z A-Z]*$/", $fname) || !preg_match("/^[a-z A-Z]*$/", $lname) || !preg_match("/^[a-z A-Z]*$/", $mname)) {
			header("Location: ../teacher/signup.php?input=invalid");
			exit();
		}else{
			$sqlEmailGet = "SELECT email FROM teacher WHERE email='$email';";
			$sqlEmailQuery = mysqli_query($conn, $sqlEmailGet);
			$sqlEmailResult = mysqli_num_rows($sqlEmailQuery);
			if ($sqlEmailResult == 1) {
				header("Location: ../teacher/signup.php?email=taken");
				exit();
			}else{
				if ($conpwd != $pwd) {
					header("Location: ../teacher/signup.php?pwd=notmatch");
					exit();
				}else{
					$hashedPwd = base64_encode($pwd);

					$sql = "INSERT INTO teacher (fname, mname, lname, email, pwd, subId, grdId, secId) VALUES ('$fname', '$mname', '$lname', '$email', '$hashedPwd', '$subject', '$grade', '$section');";
					mysqli_query($conn, $sql);
					header("Location: ../teacher/portal.php?signup=success");
					exit();
				}
			}
		}
	}
}
 ?>