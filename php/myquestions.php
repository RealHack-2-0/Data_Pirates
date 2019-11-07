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
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->




</head>
<?php include 'navbar.php';?>

<div class="container">

<?php 
$manager=new manager();
$resultArr=$manager->load_my_questions($_SESSION['currentuser']['id']);
if (is_null($resultArr)){
  echo('no questions added yet.');
}else{
  foreach($resultArr as $result) {
    $resultArr=is_null($manager->load_answers($result['q_id'])) ? '': ' (Answered)';
    echo ('<div class="card border-success mb-3" >
    <div class="card-body">
      <h4 class="card-title">'.$result['title'].$resultArr.'</h4>
      <p class="card-text">'.$result['content'].'</p>
    <div class="container">
      <div class="row">
        <div class="col-sm">
            <a href="myqs_answer.php?id='.$result['q_id'].'" class="btn btn-primary">View Answers</a> 
          </div>
          
        </div>
      </div>
    </div>
  </div>');
  };}?>
</div>

</div>