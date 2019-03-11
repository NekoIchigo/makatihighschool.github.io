<!-- Modal for Viewing  -->
	

				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-center">
							<div class="row">
							<div class=" col-12-xs col-12-md col-12-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">GRADES AND SECTION</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							
							<div class="modal-body">
								
							<form autocomplete='off' method="POST" action="grading.inc.php">
								<table id="table"class="table   table-bordered table-hover text-justify text-wrap table-striped ">
									<div class="row">
							<div class="col-12-xs col-12-md col-12-lg">
									<thead class="thead-dark ">
										<tr>
											<th>Student</th>
											<th>1st Quarter</th>
											<th>2nd Quarter</th>
											<th>3rd Quarter</th>
											<th>4th Quarter</th>
											<th>Gen.Average</th>
										</tr>
									</thead>
									<tbody >
											<?php 
											$grade = $_SESSION['t_grdId'];
											$section = $_SESSION['t_secId'];

											$sql = "SELECT * FROM grade, section WHERE gradeId = '$grade' AND sectionId = '$section';";
											$query = mysqli_query($conn,$sql);
											while ($row = mysqli_fetch_assoc($query)) { 
												echo "Grade ".$row['grade']." - ".$row['section']."<b> * Note: Do not forget to select the subject before saving.</b>";
											}
											$sqlStudent = "SELECT studentId, fname, mname, lname FROM student WHERE grdId = '$grade' AND secId = '$section';";
											$queryStudent = mysqli_query($conn,$sqlStudent);
											$x = 0;

											while ($rowStudent = mysqli_fetch_array($queryStudent)){
												echo "
												<tr>
												<td>
												<input id='sid' class='col-lg-4 col-md-12 col-xs-12 w-100' type='hidden' name='student".$x."' readonly value='".$rowStudent['studentId']."'>".$rowStudent['fname']." ".$rowStudent['lname']."</td>
												<td><input id='st' type='text' name='1stquar".$x."' class='col-lg-12 col-md-12 col-xs-12 w-100' maxlength='2' value='0' style='border-left: none; border-top: none; border-right: none; border-bottom: solid black 2px;'></td>
												<td><input id='nd' type='text' name='2ndquar".$x."' class='col-lg-12 col-md-12 col-xs-12 w-100' maxlength='2' value='0' style='border-left: none; border-top: none; border-right: none; border-bottom: solid black 2px;'></td>
												<td><input id='rd' type='text' name='3rdquar".$x."' class='col-lg-12 col-md-12 col-xs-12 w-100' maxlength='2' value='0' style='border-left: none; border-top: none; border-right: none; border-bottom: solid black 2px;'></td>
												<td><input id='th' type='text' name='4thquar".$x."' class='col-lg-12 col-md-12 col-xs-12 w-100' maxlength='2' value='0' style='border-left: none; border-top: none; border-right: none; border-bottom: solid black 2px;'></td>
												<td></td>
												</tr>";
												$x++;
											}
											?>
									</tbody>
								</div>
							</div><br>
							<label for="Subject">Select a Subject</label>
							 <select name="subject">
								<option selected disabled>Select your Subject</option>
								<?php 
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
									echo "<option value='".$abcd['subjectId']."'>".$abcd['subject']."</option>";
									}
									echo "<option value='".$subjects['subjectId']."'>".$subjects['subject']."</option>";
								}
								?>
							</select>
							<button class="btn btn-primary" type="submit" name="save" style="float: right;">Save</button>
								</table></form>
								</div>
						</div>
					</div>
					</div>
					</div>
								</div>