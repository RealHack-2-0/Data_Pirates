<div class="container">
<?php 
$manager=new manager();
$resultArr=$manager->load_answers();

foreach($resultArr as $result) {
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['username'].'</h4>
    <p class="card-text">'.$result['content'].'</p>
</div>
</div>');
};?>
</div>