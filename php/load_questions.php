<?php 

require_once('manager.php');

$manager=new manager();

$result=$manager->load_questions();
echo var_dump($result);
 ?>