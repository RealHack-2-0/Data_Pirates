 <?php require_once('Utility.php'); ?>

<?php 
class logger{
	private $email;
	private $password;
	private $utility;

	public function __construct($email,$psw){
		$this->email=$email;
		$this->password=$psw;
		$this->utility=new Utility();
	}

	public function login(){
		$result=$this->utility->compareLoginDetails($this->email,$this->password);
			if(($result==1)){
				return true;
			}else{
				return false;
			}
	}
}
?>
