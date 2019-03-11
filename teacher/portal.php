<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>Teachers Portal</title>
	 <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/new.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<a href="../index.php" class="btn btn-close" type="close" >Back</a>
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="page-header col-xs-12 col-md-12 col-lg-12 w-100 responsive" style="text-align: center;">
					<h1>Teachers Log In</h1>
				</div>
				<div class="content col-xs-12 col-md-12 col-lg-12 w-100 responsive" >
					<form action="../includes/login.inc.php" autocomplete="off" method="POST">

		<div class="form-group ">
							<h3><label for="E-mail">E-mail </label></h3>
		  <input class="form-control  form-control-lg " type="email" name="email" maxlength="30" required>
		</div>
		<div class="form-group">
			<h3><label for="password">Password </label></h3>
			 <input class="form-control  form-control-lg " type="password" name="pwd" maxlength="30" required>
		</div>

		<button class="btn btn-primary btn-lg" type="submit" name="teacherLogin">Log in</button>
		<p>Create account?<a href="signup.php">Click here</a></p>
	</form>
				</div>
	
</body>
</html>