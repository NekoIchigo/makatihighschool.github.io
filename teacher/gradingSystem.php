<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="View Classport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<title>Grading System</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/new.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/datatables.min.css">
		<script src="../bootstrap/jquery/popper.min.js"></script>
		<script src="../bootstrap/jquery/jquery-3.3.1.min.js"></script>
		<script src="../bootstrap/jquery/datatables.min.js"></script> 
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		

		<style type="text/css">
		.new a{

			text-decoration: none;
		}
		#update1{
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="page-header col-xs-12 col-md-12 col-lg-12 w-100">
					<?php 
					session_start();
					include '../includes/dbh.inc.php';
					echo "<h1>".$_SESSION['t_fname']." ".$_SESSION['t_mname']." ".$_SESSION['t_lname']."</h1>";

					?>
				</div>

				<div class="content col-xs-12 col-md-12 col-lg-12 w-100">
					<?php	$sub = $_SESSION['t_subId'];
					$selectSub = "SELECT * FROM subject WHERE subjectId = '$sub';";
					$result = mysqli_query($conn, $selectSub);
					$subjects = mysqli_fetch_assoc($result);
					?>

					<h4>Subjects : <?php 
					$teacherId = $_SESSION['t_id'];
					$selectAddSub = "SELECT * FROM addsub WHERE teacherId = '$teacherId'";
					$queryAddSub = mysqli_query($conn, $selectAddSub);
					$addSubResult = mysqli_num_rows($queryAddSub);
					if ($addSubResult > 0) {
						while ($abc = mysqli_fetch_assoc($queryAddSub)) {
							$addSubId = $abc['subId'];
							$selectAddSubNew = "SELECT * FROM subject WHERE subjectId = '$addSubId';";
							$queryAddSubNew = mysqli_query($conn, $selectAddSubNew);
							$abcd = mysqli_fetch_assoc($queryAddSubNew);
							echo $abcd['subject'].", ";
						}
						echo $subjects['subject'];
					}else{
					echo $subjects['subject'];}?></h4>
					<form action="../includes/logOut.inc.php" method="POST">

						<button class="close btn-dangers btn-lg" type="close" name="logout">Log out</button>
						<div class="btn-group" role="group">
							<button class="btn btn-success btn-lg" type="button" name="edit" data-toggle="modal" data-target="#update">Edit Account</button>
							<button class="btn btn-primary btn-lg" type="button" name="add" data-toggle="modal" data-target="#add">Add Grade & Section</button>

						</div>
					</form>
					<br>
						
					<table id="sectiontable"class="table   table-bordered table-hover text-justify text-wrap table-striped " style="text-align:  center">
						<thead class="thead-dark">
							<tr>
								<th>Section </th>
								<th>Grade level</th>
								<th>action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php 
								$a = $_SESSION['t_secId'];
								$b = "SELECT * FROM section WHERE sectionId = '$a';";
								$c  = mysqli_query($conn, $b);
								$d = mysqli_fetch_assoc($c);
								echo $d['section']; ?></td>
								<td><?php 
								$ab  = $_SESSION['t_grdId'];
								$bb  = "SELECT * FROM grade WHERE gradeId = '$ab';";
								$cb   = mysqli_query($conn, $bb);
								$db  = mysqli_fetch_assoc($cb);
								echo $db['grade']; ?></td>
								<td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='.bd-example-modal-lg'>View Class</button></td>
							</tr>
								<?php 
								$ac  = $_SESSION['t_id'];
								$bc  = "SELECT * FROM addSec WHERE teacherId = '$ac';";
								$cc   = mysqli_query($conn, $bc);
								while ($hc  = mysqli_fetch_assoc($cc)) {
								$addSecGrade = $hc['grdId'];
								$addSection = $hc['secId'];
								$ec  = "SELECT * FROM grade, section WHERE gradeId = '$addSecGrade' AND sectionId = '$addSection';";
								$fc   = mysqli_query($conn, $ec);
								$gc  = mysqli_fetch_assoc($fc);
								echo "<tr><td>".$gc['section']."</td>
								<td>".$gc['grade']."</td>
								<td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='.bd-example-modal-lg'>View Class</button></td></tr>";
							}
								?></td>
							</tr>
						</tbody>
					</table>
				</div>
		
					<?php 
					include 'modalClassView.php';
					include 'modalAddClass.php';
					include 'modalEditAcc.php'; ?>

			<script type="text/javascript">
				$(document).ready(function() {
					$('#table').DataTable();
					$('#sectiontable').DataTable();
					});
				</script>
				<script>
				$('.new ').click(function(){
					$('.update').animate({height: "toggle", opacity: "toggle"}, "slow");    
				});
			</script>
		</body>
		</html>