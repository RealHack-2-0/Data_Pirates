<?php 
require_once('initialize.php');
if(isset($_SESSION['set'])){
}
else{
  header("Location:index.php");
}

$manager=new manager();
$resultArr=$manager->load_subjects();

// print_r($resultArr);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<title>Add New Question</title>
</head>
<body style="background-color: #DADEDF;">
	<?php include 'navbar.php';?>
	<div class ="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:8rem; background-color: ;" >
			<div class="card-header" style="text-align: center">
				Add New Question
			</div>
			<div class="card-body">
		<form class="box" action="manager.php" method="post">
			<!-- <div class="form-group">
				<input type="text" name="subject" class = "form-control" placeholder="Subject" required="" id="">
			</div> -->
			<div class="form-group">
			<label for="">Subject</label>
     			<select class="form-control" name="subject" type="text" placeholder="status" >
						<?php 
							foreach($resultArr as $result) {
									echo('
									<option>'.$result['sub_name'].'</option>
									');
							};
						
						?>
		        </select>
				</div>
			<div class="form-group">
			<label for="">Title</label>
				<input type="text" name="title" class = "form-control" placeholder="" required="" id="">
			</div>
			<div class="form-group">
			<label for="">Content</label>
				<input type="text" name="content" class = "form-control" placeholder="" required="" id=""><br>
			</div>
			<div class="form-group" style="text-align: center;">
				<input type="submit" name="addquestion" class="btn btn-primary"value="Submit" >
			</div>
		</form>
		</div>
</body>
</html>