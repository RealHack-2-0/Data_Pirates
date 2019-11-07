

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




</head>
<body style="background-color: #DADEDF;">
<?php include 'navbar.php';?>

	<header>
	<div class ="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
		<div class="card-header" style="text-align: center">
			Login
		</div>
		<!-- <h3 class="text-center p-4">/h3> -->
		<div class="card-body">
			<form class="box" action="manager.php" method="post">
			<div class="form-group">
				<input type="email" name="email" class = "form-control" placeholder="Username" required="" id="">
			</div>
			<div class="form-group">
				<input type="password" name="password" class = "form-control" placeholder="Password" required="" id=""><br>
			</div>
			<div class="form-group" style="text-align: center;">
				<input type="submit" name="login" class="btn btn-primary"value="Login" >
			</div>
				<p>Don't have an account ? <a href="signup.php"> Sign Up Here</a></p>
			</form>
			</div>
		</div>
	</div>
</div>
	</header>
</body>
</html>