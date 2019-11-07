<!DOCTYPE html>
<html>
<head>
	<title>Add New Question</title>
</head>
<body>
		<form class="box" action="manager.php" method="post">
			<div class="form-group">
				<input type="text" name="subject" class = "form-control" placeholder="Subject" required="" id="">
			</div>
			<div class="form-group">
				<input type="text" name="title" class = "form-control" placeholder="Title" required="" id="">
			</div>
			<div class="form-group">
				<input type="text" name="content" class = "form-control" placeholder="Content" required="" id=""><br>
			</div>
			<div class="form-group" style="text-align: center;">
				<input type="submit" name="addquestion" class="btn btn-primary"value="Submit" >
			</div>
		</form>
</body>
</html>