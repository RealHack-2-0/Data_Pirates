<div class="container">
<?php 
$manager=new manager();
$resultArr=$manager->load_questions();

foreach($resultArr as $result) {
  $resultArr=is_null($manager->load_answers($result['q_id'])) ? '': ' (Answered)';
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['title'].$resultArr.'</h4>
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
};?>
</div>

</div>