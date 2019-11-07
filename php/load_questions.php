<div class="container">
<?php 
$manager=new manager();
$resultArr=$manager->load_questions();
if (is_array($resultArr) && sizeof($resultArr) != 0 ) {
  foreach($resultArr as $result) {
    echo ('<div class="card border-success mb-3" >
    <div class="card-body">
      <h4 class="card-title">'.$result['title'].'</h4>
      <p class="card-text">'.$result['content'].'</p>
    <div class="container">
      <div class="row">
        <div class="col-sm">
            <a href="view_answers.php?id='.$result['q_id'].'" class="btn btn-primary">View Answers</a> 
          </div>
          <div class="col-sm">
          <form action="manager.php" method="post">
            <button type="submit" name="upvote" value="upvote">Upvote</button>
            <input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
          </form>
          <form action="manager.php" method="post">
            <button type="submit" name="downvote" value="downvote">Downvote</button>
            <input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
          </form> 
        </div>
        </div>
      </div>
    </div>
  </div>');
  };
}else{
  echo "It's lonely here!";
}


?>
</div>

</div>