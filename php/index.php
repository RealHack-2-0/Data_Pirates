<?php require_once('Connection.php'); 
 $db = Database::getInstance();
 $conn = $db->getConnection();?>
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
  <div style="margin-top: 50px">
    <?php
        function insertQuery($query,$conn) {
          $result4 = mysqli_query($conn, $query);
        if (!$result4) {
            die('Invalid query: ' . mysqli_error($conn));
        } else {
            return mysqli_insert_id($conn);
        }
      }
      function getQuestions($conn){
        $query="SELECT * FROM question";
        $result=insertQuery($query,$conn);
        if($result){
          echo($result);
        }else{
          echo('no');
        }
      }

      getQuestions($conn)

    ?>
    <?php include 'question.php' ?>
  </div>
	</header>
</body>
</html>