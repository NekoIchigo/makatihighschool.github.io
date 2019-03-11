<?php 
	session_start();
	if (isset(grades)) {
		
		include '../includes/dbh.inc.php';

		$teacherId = $_SESSION['t_id']; 
		$grades = mysqli_real_escape_string($conn, $_POST['grades']);
		$student = mysqli_real_escape_string($conn, $_POST['student']);
		if (empty($grades) || empty($student)) {
		header("Location: gradingSystem.php?addSec=empty");
		exit();
		}else{
			$sql = "INSERT INTO addsec (teacherId, grdId, secId) VALUES ('$teacherId', '$grade', '$section');";
			mysqli_query($conn, $sql);
			header("Location: gradingSystem.php?addSec=success");
			exit();
		}
	}
?>