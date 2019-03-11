<?php 
	session_start();

	if (isset($_POST['addSub'])) {

		include '../includes/dbh.inc.php';

		$teacherId = $_SESSION['t_id']; 
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		if (empty($subject)) {
		header("Location: gradingSystem.php?addSub=empty");
		exit();
		}else{
			$sql = "INSERT INTO addsub (teacherId, subId) VALUES ('$teacherId', '$subject');";
			mysqli_query($conn, $sql);
			header("Location: gradingSystem.php?addSub=success");
			exit();
		}
	}
?>