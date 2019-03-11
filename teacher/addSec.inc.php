<?php 
	session_start();

	if (isset($_POST['addSec'])) {

		include '../includes/dbh.inc.php';

		$teacherId = $_SESSION['t_id']; 
		$grade = mysqli_real_escape_string($conn, $_POST['grade']);
		$section = mysqli_real_escape_string($conn, $_POST['section']);
		if (empty($grade) || empty($section)) {
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