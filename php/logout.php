<?php
	require_once('initialize.php');

	UNSET($_SESSION['set']);
	session_destroy();
	header("Location:index.php");
?>