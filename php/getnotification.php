

<?php

require_once ('manager.php');


$manager=new manager();
$resultArr=$manager->load_notification();

echo json_encode($resultArr); 

//  select notification from notification where session_id = user_id and status = 1;

?>