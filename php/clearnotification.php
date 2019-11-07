

<?php

require_once ('manager.php');


$manager=new manager();
$resultArr=$manager->clear_notification();



//  select notification from notification where session_id = user_id and status = 1;

?>