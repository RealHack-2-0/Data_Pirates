<?php 
	 require_once('DBController.php');
	 require_once('config.php');
	?>

<?php 
	class Utility{
		public $controller;

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

		public function getUserIdInfoByEmail($email){
			$query="SELECT id FROM user WHERE email='$email'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
		
		public function getsubjectid($subject){
			$query="SELECT subject_id FROM subject WHERE sub_name='$subject'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}


		public function addquestion($subject_id,$title,$userid,$content){
			$query="INSERT INTO question (user_id,subject_id,title,content)VALUES ('$userid','$subject_id','$title','$content')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}


		public function getQuestions(){
			$query="SELECT * from question order by upvote_count desc limit 10";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function upvote($q_id){
			$query="UPDATE question SET upvote_count=upvote_count+1 WHERE q_id='$q_id'";
			$result=$this->controller->updateQuery($query);
		}
		
		public function getSubjectss(){
			$query="SELECT sub_name from subject";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function downvote($q_id){
			$query="UPDATE question SET downvote_count=downvote_count+1 WHERE q_id='$q_id'";
			$result=$this->controller->updateQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function load_answers($q_id){
			$query="SELECT * from answer,user where user_id=id and q_id='$q_id'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
	}

?>