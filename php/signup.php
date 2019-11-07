<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>signup</title>
	<link rel="stylesheet" href="../css/signup.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="manager.php" method="post">
				<h2>SIGN UP</h2>
				<input type="text" name="user_name" placeholder="Name" required="">

				<input type="email" name="Email" placeholder="Email Address" required="">
				
      			<!-- <label for="">Gender</label> -->
     			<select class="main" name="status" type="text" placeholder="status"  >
		        <option>Teacher</option>
		        <option>Undergraduate</option>
		        </select>

				<h6 class="pwd-rules">"Your password must contain at least 8 alphabetical[both (a-z)&(A-Z)] and numerical characters "</h6>
				<input type="password" name="password" placeholder="Password" id="" required="">
				<input type="password" name="reconfirmedPassword" placeholder="Re-Confirm Password" required="">
				</br>
				<input type="submit" name="signup_JS"value="Sign up" >

				<P>Already have an account ? <a href="login.php"> Log In Here</a></P>
			</form>
		</div>
	</header>
</body>
</html>