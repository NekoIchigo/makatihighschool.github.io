<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document"> 
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12 col-lg-12 col-md-12">

											<div class="jumbotron col-xs-12 col-lg-12 col-md-12 w-100">
												<h3 style="text-align: center">Current Info</h3>
												<br>
												<div class="row">
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Firstname:</h6><p><?php echo $_SESSION['t_fname']; ?></p></div>
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Middlename:</h6><p> <?php echo $_SESSION['t_mname']; ?></p></div>
													<div class="col-xs-12 col-lg-2 col-md-12"><h6>Lastname:</h6><p> <?php echo $_SESSION['t_lname']; ?></p></div>
													<div class="col-xs-12 col-lg-3 col-md-12"><h6>E-mail:</h6><p> <?php echo $_SESSION['t_email']; ?></p></div>
													<div class="col-xs-12 col-lg-3 col-md-12"><h6>Password:</h6><p> <?php echo $_SESSION['t_pwd']; ?></p></div>
													<div class="col-xs-12 col-lg-12 col-md-12">
														<p class="new" ><a  href="#update1">Click Update</a></p>

													</div>




												</div>
											</div>
											<form autocomplete="off" action="addSub.inc.php" method="POST">
												<div class="row">

													<div class="col-xs-12 col-lg-4 col-md-12">
														<h3><label for="Subject ">Add Subject:</label></h3>
													</div>
													<div class="col-xs-12 col-lg-4 col-md-12">
														<div class="form-group ">
															<select class="form-control  form-control-lg " name="subject">
																<option selected disabled>Select your subject</option>
																<?php 
																include '../includes/dbh.inc.php';
																$sqlSubject = "SELECT * FROM subject";
																$sqlSubjectQuery = mysqli_query($conn, $sqlSubject);
																while ($row = mysqli_fetch_assoc($sqlSubjectQuery)) {
																	echo "<option value='".$row['subjectId']."'>".$row['subject']."</option>";
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-xs-12 col-lg-2 col-md-12">
														<button class="btn btn-primary btn-lg" type="submit" name="addSub">Add</button>
													</div>

												</div>
											</form>

											<form  class="update" action="../includes/edit.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data" id="update1">
												<div class="jumbotron col-xs-12 col-lg-12 col-md-12 w-100">
													<h3>New Info</h3>
													<p style="color: blue;">Note* Don't fill up the columns you don`t want to change.</p>
													<h3><label for="Firstname ">Firstname</label></h3>
													<input class="form-control  form-control-lg " type="text" name="fname" >

													<h3><label for="Middlename ">Middlename</label></h3>
													<input class="form-control  form-control-lg " type="text" name="mname" >

													<h3><label for="Lastname ">Lastname</label></h3>
													<input class="form-control  form-control-lg " type="text" name="lname" >

													<h3><label for="Email ">Email</label></h3>
													<input class="form-control  form-control-lg " type="email" name="email" >

													<h3><label for="Password ">Password</label></h3>
													<input class="form-control  form-control-lg " type="text" name="pwd" maxlength="10" >

													<h3><label for="Confirm Password ">Confirm Password</label></h3>
													<input class="form-control  form-control-lg " type="text" name="conpwd" maxlength="10" >
													<br>	
<button class="btn btn-primary btn-lg" type="submit" name="teacherEdit">Update</button>
</div>
										</form>`
												</div>
											</div>
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div> 