<?php 
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php'); 
?>
<?php
if(isset($_POST['signup'])){
	$manager->signupJS();  
}elseif (isset($_POST['login'])){
	$manager->login(); 	
}

class manager{
	private $mylogger;
	private $msg;

	private static $sessions=array();

	public static function getInstance($key)
    {
        if(!array_key_exists($key, self::$sessions)) {
            self::$sessions[$key] = new self();
        }

        return self::$sessions[$key];
    }

    private function __construct(){}

    private function __clone(){}

	

	public function login(){
		$this->msg = "";
		$email=$_POST['email'];
		$psw=$_POST['password'];	
		$this->mylogger = new logger($email,$psw);
		$result=$this->mylogger->login();
		if ($result){

			//require_once('initialize.php'); 
			//$db = Database::getInstance();
			//$connection = $db->getConnection(); 
			echo "Logged In";
			$_SESSION['set']="set";
			$_SESSION['currentseller']=new seller();
			$gotInfo=($_SESSION['currentseller']->getBasicInfoByEmail($email));
			//if($gotInfo){
			//	$gotlist=$this->getSellersItemList(); 
			//	echo "<pre>";
			//	var_dump($gotlist);
			//	echo "</pre>";
			//	header("Location:sellerAcc.php");
			//}else{
			//	$this->msg = "something went wrong.Please try again";
			//}
		}
		else{
			$this->msg = "Password, Username mismatch";
			header("Location:LoginError.php");
		}
	}

	public function signup(){

		$email=$_POST['Email'];
		$psw=$_POST['password'];
		$username=$_POST['user_name'];
		$status = $_POST['status'];
		$token = "";

		//////////////////////////////////////
		$utility=new Utility();
		$isSignedup=$utility->checkSignup($email);
		//////////////////////////////////////


		if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["reconfirmedPassword"])) {
    		$password = ($_POST["password"]);
    		$cpassword = ($_POST["reconfirmedPassword"]);
	   		if (strlen($_POST["password"]) < '8') {
	        	$this->msg = "Your Password Must Contain At Least 8 Characters!";
	    	}
	    	elseif(!preg_match("#[0-9]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Number!";
	    	}
	    	elseif(!preg_match("#[A-Z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Capital Letter!";
	    	}
	    	elseif(!preg_match("#[a-z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Lowercase Letter!";
	    	}
	    	elseif($isSignedup){
	        	$this->msg = "Your email address has been used";
	    	}
	    	else{
	    		$this->JS= new jobseeker();
				$this->JS->init($email,$psw,$username,$status,$token);

				$entered_to_db=$this->JS->adduser();

				if($entered_to_db){

					$_SESSION['JS_email'] = $email ;

					header("Location:login.php");
					$this->msg = "Done";
					//$this->getsellerRequestsList();					
				}else{
				$this->msg="Something went wrong. Please try again or please check your email.";
				}
	    	}
			}
			elseif(!empty($_POST["password"])) {
	    		$this->msg = "Please Check You've Entered Or Confirmed Your Password!";
			} else {
	     	$this->msg = "Please enter password   ";
			}
			if($this->msg == "Done"){}
			else{
			//header("Location:SignupError.php?msg=".$this->msg);}
			echo $this->msg;

		}
	}



	}

?>