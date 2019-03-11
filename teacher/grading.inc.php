<?php 
	session_start();
	include '../includes/dbh.inc.php';
	$grade = $_SESSION['t_grdId'];
	$section = $_SESSION['t_secId'];
	$sqlStudent = "SELECT * FROM student WHERE grdId = '$grade' AND secId = '$section';";
											$queryStudent = mysqli_query($conn,$sqlStudent);
											$x = 0;

	while ($rowStudent = mysqli_fetch_assoc($queryStudent)) {
 if (isset($_POST['save'])) {
 												$subject = $_POST['subject'];
												$studentName = $_POST['student'.$x];
												$st = $_POST['1stquar'.$x];
												$nd = $_POST['2ndquar'.$x];
												$rd = $_POST['3rdquar'.$x];
												$th = $_POST['4thquar'.$x];
												$a = $st + $nd + $rd + $th;
												$fGrd = $a/4;
												$teacherId = $_SESSION['t_id'];
												$sql = "INSERT INTO grades (1st, 2nd, 3rd, 4th, f_grd, s_id, t_id, subId) VALUES ('$st','$nd','$rd','$th','$fGrd','$studentName','$teacherId','$subject')";
												mysqli_query($conn,$sql);
												$x++;
												}
												header("Location: gradingSystem.php?save=success");
											}
											?>