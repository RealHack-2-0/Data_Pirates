<?php require_once('initialize.php');?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php" style="color: black;font-weight: 700"> Risposté <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/Font_Awesome_5_regular_comment-dots.svg" alt="" style="height: 30px">  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <?php 
      if(isset($_SESSION['set'])){
        echo '
        <li class="nav-item">
        <a class="nav-link" href="addquestion.php"><i class="fas fa-plus-circle"></i> Add Question</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="myquestions.php"><i class="fas fa-question"></i> My Questions</a>
      </li>
      </ul>
      <ul class="navbar-nav navbar-right">
    <li class="nav-item">
    <a class="nav-link" href="javascript:void(0)">
      <span class="" id="notification" onclick="openNav()"><i class="far fa-bell"></i></span>
      <span class="badge"></span>
    </a>
    <li class="nav-item">
    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
     </li>
        ';
      }
      else{
        echo '</ul>
        <ul class="navbar-nav navbar-right">

      
      <li class="nav-item">
        <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
      </li>        <li class="nav-item">
      <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </li>
        ';
      }
      ?>
      
      
     
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
<?php include 'notificationbar.php' ?>