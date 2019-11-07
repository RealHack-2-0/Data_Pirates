

<div class="container">
<?php 
$manager=new manager();
$resultArr=$manager->load_questions();

foreach($resultArr as $result) {
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['title'].'</h4>
    <p class="card-text">'.$result['content'].'</p>
    <a href="" class="btn btn-primary">Upvote</a>
    <a href="" class="btn btn-primary">Downvote</a>
    <a href="" class="btn btn-primary">View Answers</a>
  </div>
</div>');
};?>
</div>
