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
<button type="submit" name="upvote" value="upvote">Upvote</button>
<input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
</form>
<form action="manager.php" method="post">
  <button type="submit" name="downvote" value="downvote">Downvote</button>
<input type="hidden" id="q_id" name="q_id" value='.$result['q_id'].'>
</form> 
<a href="view_answers.php?id='.$result['q_id'].'">View Answers</a> 

</div>
</div>');
};?>
</div>

<div class="container">
</div>