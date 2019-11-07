<?php 
	 require_once('DBController.php');
	 require_once('config.php');
	?>




<?php 
	class Utility{
		private $controller;

		public function __construct(){
			$this->controller= new DBController();
		}

		public function adduser($email,$password,$name,$is_active){
			$query="INSERT INTO user (email,password,username,isActive)VALUES ('$email','$password','$name','$is_active')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return true;
			}else{
				return false;
			}
		}

		public function compareLoginDetails($email,$psw){
			$query="SELECT * FROM user WHERE email='$email' AND password='$psw'";
			$result=$this->controller->numRows($query);

			return $result;
		}

		public function checkSignup($email){
			$query="SELECT * FROM user WHERE email LIKE '%$email%'";
			$result=$this->controller->numRows($query);
			return $result;
		}

		

	}

?>