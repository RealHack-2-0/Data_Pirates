<?php 
	require_once('manager.php');
 ?>

<div class="container">
<?php 
$manager=new manager();
$q_id=$_GET['id'];
$resultArr=$manager->load_answers($q_id);
if (is_null($resultArr)){
	echo('empty');
}else{
	foreach($resultArr as $result) {
  echo ('<div class="card border-success mb-3" >
  <div class="card-body">
    <h4 class="card-title">'.$result['username'].'['.$result['type'].']'.'</h4>
    <p class="card-text">'.$result['content'].'</p>
  </div>
  <a href="addanswer.php?id='.$result['q_id'].'">View Answers</a> 
</div>');
};

}

?>
</div>