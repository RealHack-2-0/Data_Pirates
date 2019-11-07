

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<link rel="stylesheet" href="../css/user_login.css">
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" href="">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="manager.php" method="post">
				<h1>LOG IN</h1>
				<br><input type="email" name="JS_email" placeholder="Username" required="" id="">
				<input type="password" name="password" placeholder="Password" required="" id=""><br>
				<input type="submit" name="login" value="Log in" >

				<p>Don't have an account ? <a href="signup.php"> Sign Up Here</a></p>
			</form>
		</div>
	</header>
</body>
</html>