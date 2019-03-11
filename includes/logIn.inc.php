<?php
	session_start();
	//error handler for log in
	if(isset($_POST['studentLogin'])){

	include "dbh.inc.php";

	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//check if the username and password is not empty
	if (empty($email) || empty($pwd)) {
		header("Location: ../student/portal.php?login=empty"); 
		exit();
	} else{
		//check if the username is correct
		$sql = "SELECT * FROM student WHERE email='$email'";
		$sqlGet = mysqli_query($conn, $sql);
		$sqlCheck = mysqli_num_rows($sqlGet);
		if ($sqlCheck < 1) {
			header("Location: ../student/portal.php?login=usernotexist");
			exit();
		}else{
			//check the password 
			if ($row = mysqli_fetch_assoc($sqlGet)) {
				//de-hashing password
				$pwdCheck = base64_decode($row['pwd']);
				if ($pwdCheck != $pwd) {
					header("Location: ../student/portal.php?incorrectPassword");
					exit();
				}elseif ($pwdCheck == $pwd) {
						$_SESSION['s_id'] = $row['studentId']; 
						$_SESSION['s_fname'] = $row['fname'];
						$_SESSION['s_mname'] = $row['mname']; 
						$_SESSION['s_lname'] = $row['lname']; 
						$_SESSION['s_email'] = $row['email'];
						$_SESSION['s_grdId'] = $row['grdId']; 
						$_SESSION['s_secId'] = $row['secId'];  
						$_SESSION['s_pwd'] = $pwd;
						header("Location: ../student/gradingSystem.php?login=success");
						exit();
				}
			}
		}
	}
}elseif(isset($_POST['teacherLogin'])){

	include "dbh.inc.php";

	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//check if the username and password is not empty
	if (empty($email) || empty($pwd)) {
		header("Location: ../teacher/portal.php?login=empty"); 
		exit();
	} else{
		//check if the username is correct
		$sql = "SELECT * FROM teacher WHERE email='$email'";
		$sqlGet = mysqli_query($conn, $sql);
		$sqlCheck = mysqli_num_rows($sqlGet);
		if ($sqlCheck < 1) {
			header("Location: ../teacher/portal.php?login=usernotexist");
			exit();
		}else{
			//check the password 
			if ($row = mysqli_fetch_assoc($sqlGet)) {
				//de-hashing password
				$pwdCheck = base64_decode($row['pwd']);
				if ($pwdCheck != $pwd) {
					header("Location: ../teacher/portal.php?incorrectPassword");
					exit();
				}elseif ($pwdCheck == $pwd) {
						$_SESSION['t_id'] = $row['teacherId']; 
						$_SESSION['t_fname'] = $row['fname'];
						$_SESSION['t_mname'] = $row['mname']; 
						$_SESSION['t_lname'] = $row['lname']; 
						$_SESSION['t_email'] = $row['email']; 
						$_SESSION['t_subId'] = $row['subId'];  
						$_SESSION['t_pwd'] = $pwd;
						$_SESSION['t_grdId'] = $row['grdId']; 
						$_SESSION['t_secId'] = $row['secId'];  
						header("Location: ../teacher/gradingSystem.php?login=success");
						exit();
				}
			}
		}
	}
}
?>
 