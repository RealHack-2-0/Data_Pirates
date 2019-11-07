<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>
<body style="background-color: #DADEDF;">
	<?php include 'navbar.php';?>
	<header>
		<div class ="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
			<div class="card-header" style="text-align: center">
				Sign Up
			</div>
			<!-- <h3 class="text-center p-4">/h3> -->
			<div class="card-body">
				<form class="box" action="manager.php" method="post">
				<div class="form-group">
					<input type="text" name="user_name" placeholder="Name" required="" class="form-control">
				</div>
				<div class="form-group">
					<input type="email" name="Email" placeholder="Email Address" required="" class="form-control">
				</div>
				<div class="form-group">
     			<select class="form-control" name="status" type="text" placeholder="status" >
		        <option>Teacher</option>
		        <option>Undergraduate</option>
		        </select>
				</div>
				<!-- <p>"Your password must contain at least 8 alphabetical[both (a-z)&(A-Z)] and numerical characters "</p> -->
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" id="" required="" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="reconfirmedPassword" placeholder="Re-Confirm Password" required="" class="form-control">
				</div>
				<div class="form-group" style="text-align: center;">
					<input type="submit" name="signup"value="Sign Up" class="btn btn-primary" >
				</div>
				<P>Already have an account ? <a href="login.php"> Log In Here</a></P>
			</form>
		</div>
	</header>
</body>
</html>