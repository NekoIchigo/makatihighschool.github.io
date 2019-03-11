<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h3>Add Class</h3>
								<form autocomplete="off" action="addSec.inc.php" method="POST">
									<div class="form-group ">
										<div class="row">
											<div class="col-md-12 col-xs-12 col-lg-6">
												<h3><label for="Grade">Grade</label></h3>
												<select class="form-control  form-control-lg "  name="grade">
													<option selected disabled>Select grade</option>
													<?php 
													include '../includes/dbh.inc.php';
													$sqlGrade = "SELECT * FROM grade";
													$sqlGradeQuery = mysqli_query($conn, $sqlGrade);
													while ($row = mysqli_fetch_assoc($sqlGradeQuery)) {
														echo "<option value='".$row['gradeId']."'>".$row['grade']."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-md-12 col-xs-12 col-lg-6">
												<div class="form-group ">
													<h3><label for="Section ">Section</label></h3>
													<select  class="form-control  form-control-lg " name="section">
														<option selected disabled>Select section</option>
														<?php 
														include '../includes/dbh.inc.php';
														$sqlSection = "SELECT * FROM section";
														$sqlSectionQuery = mysqli_query($conn, $sqlSection);
														while ($row = mysqli_fetch_assoc($sqlSectionQuery)) {
															echo "<option value='".$row['sectionId']."'>".$row['section']."</option>";
														}
														?>
													</select><br>

												</div>
											</div>
									
      </div>
      <div class="modal-footer">
			<button class="btn btn-primary btn-lg" type="submit" name="addSec">Add</button>
		</div>
		</div>
		</form>
      </div>
    </div>
  </div>
</div>