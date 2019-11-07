<?php 
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php');
	require_once('user.php'); 
?>
<?php
if(isset($_POST['signup'])){
	$manager->signup(); 
}elseif (isset($_POST['login'])){
	$manager->login();
}elseif (isset($_POST['upvote'])){
	$manager->upvote();
}elseif (isset($_POST['downvote'])){
	$manager->downvote();
}elseif (isset($_POST['view_answers'])){
	$manager->view_answers(); 	
}elseif (isset($_POST['addquestion'])){
	$manager->addquestion(); 	
}elseif (isset($_POST['addanswer'])) {
	$manager->addanswer(); 
}

class manager{
	private $mylogger;
	private $msg;
	private $user;

	private static $sessions=array();

	public static function getInstance($key)
    {
        if(!array_key_exists($key, self::$sessions)) {
            self::$sessions[$key] = new self();
        }

        return self::$sessions[$key];
    }

    public function __construct(){}

    private function __clone(){}

	

	public function login(){
		$this->msg = "";
		$email =  $_POST['email'];
		$psw=$_POST['password'];	

		$this->mylogger = new logger($email,$psw);
		$result=$this->mylogger->login();
		if ($result){

			
			$_SESSION['set']="set";

			$utility=new Utility();
			$_SESSION['currentuser']= $utility -> getUserIdInfoByEmail($email)[0];
			
			$user = $_SESSION['currentuser'];
			print_r($user);
			header("Location:index.php");

			
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
		$is_active = 1;

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
	    		$this->JS= new user();
				$this->JS->init($email,$psw,$username,$status,$is_active,$token);

				$entered_to_db=$this->JS->adduser();

				if($entered_to_db){

					$_SESSION['email'] = $email ;

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
	     	$this->msg = "Please enter password";
			}
			if($this->msg == "Done"){}
			else{
			//header("Location:SignupError.php?msg=".$this->msg);}
			echo $this->msg;

		}
	}

	public function addquestion(){
		$userid = $_SESSION['currentuser']['id'];

	
		$content = $_POST['content'];
		$title = $_POST['title'];
		$subject = $_POST['subject'];

		$utility=new Utility();
		$subject_id = $utility->getsubjectid($subject)[0];
		
		$questionadded = $utility->addquestion($subject_id['subject_id'],$title,$userid,$content);

		if($questionadded){
			header("Location:index.php");
		}else{
			echo "error";
		}
	}

	public function load_questions(){
		$utility=new Utility();
		$result=$utility->getQuestions();
		return $result;
	}

	public function upvote(){
		$utility=new Utility();
		$result=$utility->upvote($_POST['q_id'],$_POST['id']);
		return $result;
	}

	public function downvote(){
		$utility=new Utility();
		$result=$utility->downvote($_POST['q_id'],$_POST['id']);
		return $result;
	}

	public function load_subjects(){
		$utility=new Utility();
		$result=$utility->getSubjectss();
		return $result;
	}

	public function load_answers($q_id){
		$utility=new Utility();
		$result=$utility->load_answers($q_id);
		return $result;
	}

	public function addanswer(){
		$q_id = $_POST['q_id'];
		$user_id = $_SESSION['currentuser']['id'];
		$ans = $_POST['content'];

		$utility=new Utility();
		$result=$utility->addanswer($q_id,$user_id,$ans);
	
	if ($result){
		$result1=$utility->getauther($q_id);
		$result1=$utility->addnotification($q_id,$user_id);
	}else{
		echo "error";
	}
	

}
}

?>