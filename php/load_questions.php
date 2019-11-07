<div class="container">
<?php 
$manager=new manager();
$resultArr=$manager->load_questions();

foreach($resultArr as $result) {
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['title'].'</h4>
    <p class="card-text">'.$result['content'].'</p>
    <form action="manager.php" method="post">
<button type="submit" class="btn btn-success" value="upvote">Upvote</button>
<input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
</form>
<form action="manager.php" method="post">
  <button type="submit" class="btn btn-danger" value="downvote">Downvote</button>
<input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
</form>  
<form action="manager.php" method="post">
    <button type="submit" value="view_answers">View Answers</button>
<input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
</form>
  </div>
</div>');
};?>
</div>

<div class="container">
</div>