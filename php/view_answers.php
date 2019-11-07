<?php require_once('manager.php');
require_once('utility.php'); ?>


<?php require_once('Connection.php'); 
      require_once('initialize.php');
 $db = Database::getInstance();
 $conn = $db->getConnection();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta charset="utf-8">
	<title>Home</title>
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
  <div style="margin-top: 50px">
    
<div class="container">
<?php 
$manager=new manager();
$q_id=$_GET['id'];
$resultArr=$manager->load_answers($q_id);
if (is_null($resultArr)){
	
}else{
	foreach($resultArr as $result) {
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['username'].'['.$result['type'].']'.'</h4>
    <p class="card-text">'.$result['content'].'</p>
  </div>
</div>');
};

}


$q_id=$_GET['id'];
?>
	<div class ="card border-primary mb-3">
		<div class="card-body">
    <div class="form-group">

			<form action="manager.php" method="post">
      <input type="hidden" id="q_id" name="q_id" value=<?= $q_id ?> >
      <div class="form-group">
        <input type="text" name="content" class = "form-control" placeholder="Add your answer" required="" id="">
      </div>
			<div class="form-group" style="text-align: center;">
				<input type="submit" name="addanswer" class="btn btn-primary"value="Submit" >
			</div>
		</form>
		</div>
    
    </div>

</div>


	</header>
</body>
</html>