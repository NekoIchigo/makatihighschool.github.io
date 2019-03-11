<?php
	session_start();

	if (isset($_POST['teacherEdit'])) {
		
		include "dbh.inc.php";
		$id = $_SESSION['t_id'];
		$s_mname = $_SESSION['t_mname'];
		$fname = mysqli_real_escape_string($conn,$_POST["fname"]);
		$mname = mysqli_real_escape_string($conn,$_POST["mname"]);
		$lname = mysqli_real_escape_string($conn,$_POST["lname"]);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$pwd = mysqli_real_escape_string($conn,$_POST["pwd"]);
		$conpwd = mysqli_real_escape_string($conn,$_POST["conpwd"]);

		//check if the editing is not empty
		if (empty($fname) && empty($lname) && empty($mname)&& empty($email) && empty($pwd) && empty($conpwd)) {
			header("Location: ../teacher/gradingSystem.php?edit=empty");
			exit();
		}else{
			//check if the first and last name is valid
			if (!empty($fname) && empty($lname) && empty($mname)&& empty($email) && empty($pwd)) {
				$sqlfname = "UPDATE teacher SET fname='$fname' WHERE uid='$id';";
				mysqli_query($join,$sqlfnmae);
				session_unset();
				session_destroy();
				header('Location: ../teacher/gradingSystem.php?edit=success');
				exit();
			}else{
				if (!empty($lname) && empty($fname) && empty($mname)&& empty($email) && empty($pwd)) {
				$sqllname = "UPDATE teacher SET lname='$lname' WHERE uid='$id';";
				mysqli_query($join,$sqllname);
				session_unset();
				session_destroy();
				header('Location: ../teacher/gradingSystem.php?edit=success');
				exit();
			}else{
				if (!empty($email) && empty($fname) && empty($lname)&& empty($mname) && empty($pwd)) {
				$sqlemail = "UPDATE teacher SET email='$email' WHERE uid='$id';";
				mysqli_query($join,$sqlemail);
				session_unset();
				session_destroy();
				header('Location: ../teacher/gradingSystem.php?edit=success');
				exit();
				}else{
					if (!empty($mname) && empty($fname) && empty($lname)&& empty($pwd) && empty($email)) {
					$sqlmname = "UPDATE teacher SET mname='$mname' WHERE uid='$id';";
					mysqli_query($join,$sqlmname);
					session_unset();
					session_destroy();
					header('Location: ../teacher/gradingSystem.php?edit=success');
					exit();
					}else{
					//check if the email is not taken
					$sql = "SELECT * FROM teacher WHERE email = '$email';";
					$sqlCheck = mysqli_query($join,$sql);
					$sqlLook = mysqli_num_rows($sqlCheck);
					if ($sqlLook == 1) {
						header("Location: ../teacher/gradingSystem.php?email=taken");
						exit();
					}else{
						//check if the user is not taken
						$bSql = "SELECT * FROM teacher WHERE mname = '$mname';";
						$bSqlCheck = mysqli_query($join,$bSql);
						$bSqlLook = mysqli_num_rows($bSqlCheck);
						if ($bSqlLook == 1) {
							header("Location: ../teacher/gradingSystem.php?user=taken");
						exit();
					}else{
						//check if the password is NOT same as the confirm password
						if ($conpwd != $pwd) {
							header('Location: ../teacher/gradingSystem.php?pwd=notmatch');
							exit();
						}else{
							if (!empty($pwd) && empty($fname) && empty($lname)&& empty($mname) && empty($email)) {
								$hashedPwd = base64_encode($pwd);
								$sqlpwd = "UPDATE teacher SET pwd='$hashedPwd' WHERE uid='$id';";
								mysqli_query($join,$sqlpwd);
								session_unset();
								session_destroy();
								header('Location: ../teacher/gradingSystem.php?edit=success');
								exit();
							}else{
							//insert the userdata to the database
							if (!empty($fname) && !empty($lname) && !empty($mname)&& !empty($email) && !empty($pwd) && !empty($conpwd)){
							$sqlInsert = "UPDATE teacher SET fname='$fname', lname='$lname', mname='$mname', email='$email', pwd='$hashedpwd' WHERE uid='$id';";
							mysqli_query($join,$sqlInsert);
							session_unset();
							session_destroy();
								header('Location: ../teacher/gradingSystem.php?edit=success');
							exit();	
						}else{
							session_unset();
							session_destroy();
								header('Location: ../teacher/gradingSystem.php?edit=success');
							exit();	
										}
									}
								}			
							}
						}
					}
				}
			}
		}
	}
}elseif (isset($_POST['studentEdit'])) {
		
		$id = $_SESSION['s_id'];
		$s_mname = $_SESSION['s_mname'];
		$fname = mysqli_real_escape_string($conn,$_POST["fname"]);
		$mname = mysqli_real_escape_string($conn,$_POST["mname"]);
		$lname = mysqli_real_escape_string($conn,$_POST["lname"]);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$pwd = mysqli_real_escape_string($conn,$_POST["pwd"]);
		$conpwd = mysqli_real_escape_string($conn,$_POST["conpwd"]);

		//check if the editing is not empty
		if (empty($fname) && empty($lname) && empty($mname)&& empty($email) && empty($pwd) && empty($conpwd)) {
			header("Location: ../student/gradingSystem.php?edit=empty");
			exit();
		}else{
			//check if the first and last name is valid
			if (!empty($fname) && empty($lname) && empty($mname)&& empty($email) && empty($pwd)) {
				$sqlfname = "UPDATE student SET fname='$fname' WHERE uid='$id';";
				mysqli_query($join,$sqlfnmae);
				session_unset();
				session_destroy();
				header('Location: ../student/gradingSystem.php?edit=success');
				exit();
			}else{
				if (!empty($lname) && empty($fname) && empty($mname)&& empty($email) && empty($pwd)) {
				$sqllname = "UPDATE student SET lname='$lname' WHERE uid='$id';";
				mysqli_query($join,$sqllname);
				session_unset();
				session_destroy();
				header('Location: ../student/gradingSystem.php?edit=success');
				exit();
			}else{
				if (!empty($email) && empty($fname) && empty($lname)&& empty($mname) && empty($pwd)) {
				$sqlemail = "UPDATE student SET email='$email' WHERE uid='$id';";
				mysqli_query($join,$sqlemail);
				session_unset();
				session_destroy();
				header('Location: ../student/gradingSystem.php?edit=success');
				exit();
				}else{
					if (!empty($mname) && empty($fname) && empty($lname)&& empty($pwd) && empty($email)) {
					$sqlmname = "UPDATE student SET mname='$mname' WHERE uid='$id';";
					mysqli_query($join,$sqlmname);
					session_unset();
					session_destroy();
					header('Location: ../student/gradingSystem.php?edit=success');
					exit();
					}else{
					//check if the email is not taken
					$sql = "SELECT * FROM student WHERE email = '$email';";
					$sqlCheck = mysqli_query($join,$sql);
					$sqlLook = mysqli_num_rows($sqlCheck);
					if ($sqlLook == 1) {
						header("Location: ../student/gradingSystem.php?email=taken");
						exit();
					}else{
						//check if the user is not taken
						$bSql = "SELECT * FROM student WHERE mname = '$mname';";
						$bSqlCheck = mysqli_query($join,$bSql);
						$bSqlLook = mysqli_num_rows($bSqlCheck);
						if ($bSqlLook == 1) {
							header("Location: ../student/gradingSystem.php?user=taken");
						exit();
					}else{
						//check if the password is NOT same as the confirm password
						if ($conpwd != $pwd) {
							header('Location: ../student/gradingSystem.php?pwd=notmatch');
							exit();
						}else{
							if (!empty($pwd) && empty($fname) && empty($lname)&& empty($mname) && empty($email)) {
								$hashedPwd = base64_encode($pwd);
								$sqlpwd = "UPDATE student SET pwd='$hashedPwd' WHERE uid='$id';";
								mysqli_query($join,$sqlpwd);
								session_unset();
								session_destroy();
								header('Location: ../student/gradingSystem.php?edit=success');
								exit();
							}else{
							//insert the userdata to the database
							if (!empty($fname) && !empty($lname) && !empty($mname)&& !empty($email) && !empty($pwd) && !empty($conpwd)){
							$sqlInsert = "UPDATE student SET fname='$fname', lname='$lname', mname='$mname', email='$email', pwd='$hashedpwd' WHERE uid='$id';";
							mysqli_query($join,$sqlInsert);
							session_unset();
							session_destroy();
								header('Location: ../student/gradingSystem.php?edit=success');
							exit();	
						}else{
							session_unset();
							session_destroy();
								header('Location: ../student/gradingSystem.php?edit=success');
							exit();	
										}
									}
								}			
							}
						}
					}
				}
			}
		}
	}
}
?>