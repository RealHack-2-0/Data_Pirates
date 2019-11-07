<?php 
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php'); 
?>
<?php
if(isset($_POST['signup_JS'])){
	$manager->signupJS();  
}elseif (isset($_POST['login'])){
	$manager->login(); 	
}elseif (isset($_POST['add_exam'])){
	$manager->addexam();
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

	public function signupJS(){

		$email=$_POST['Email'];
		$psw=$_POST['password'];
		$nic=$_POST['nic'];
		$firstname=$_POST['first_name'];
		$lastname=$_POST['last_name'];
		$dob = $_POST['date_of_birth'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$telephone = $_POST['phone'];
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
				$this->JS->init($email,$psw,$firstname,$lastname,$telephone,$gender,$address,$nic,$token);

				$entered_to_db=$this->JS->addJS();

				if($entered_to_db){

					$_SESSION['JS_email'] = $email ;

					header("Location:JSlogin.php");
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