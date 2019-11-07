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
    <h4 class="card-title">'.$result['username'].'</h4>
    <p class="card-text">'.$result['content'].'</p>
  </div>
</div>');
};

}

?>
</div>