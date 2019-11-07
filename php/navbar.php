<?php require_once('initialize.php');?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php 
      if(isset($_SESSION['set'])){
        echo '
        <li class="nav-item">
        <a class="nav-link" href="addquestion.php">Add Question</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="javascript:void(0)">
      <span class="" id="notification" onclick="openNav()">Notifications</span>
      <span class="badge"></span>
    </a>
  </li>
        ';
      }
      else{
        echo '
        <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
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