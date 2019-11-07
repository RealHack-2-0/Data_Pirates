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

		public function adduser($email,$password,$name,$is_active,$status){
			$query="INSERT INTO user (email,password,username,isActive,type)VALUES ('$email','$password','$name','$is_active','$status')";
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

		public function upvote($q_id,$user_id){
			$checkvote="SELECT * from vote_counts where user_id='$user_id' and q_id='$q_id'";
			$checked=$this->controller->numRows($checkvote);
			if ($checked==0){
				$insert_upvote="INSERT INTO vote_counts (`user_id`, `q_id`, `up_voted`, `down_voted`) VALUES ('$user_id','$q_id',1,0)";
				$update_votes="UPDATE question SET upvote_count=upvote_count+1 WHERE q_id='$q_id'";
				$updated=$this->controller->updateQuery($update_votes);
				$inserted=$this->controller->insertQuery($insert_upvote);
			}else{
				$getvote=$this->controller->runQuery($checkvote);
				if ($getvote[0]['up_voted']==0){
					$setone="UPDATE vote_counts SET up_voted=1,down_voted=0 WHERE q_id='$q_id' and user_id='$user_id'";
					$sett=$this->controller->updateQuery($setone);
					$update_votes="UPDATE question SET upvote_count=upvote_count+1,downvote_count=downvote_count-1 WHERE q_id='$q_id'";
					$updated=$this->controller->updateQuery($update_votes);
				}else{
					$setzero="UPDATE vote_counts SET up_voted=0,down_voted=0 WHERE q_id='$q_id' and user_id='$user_id'";
					$sett=$this->controller->updateQuery($setzero);
					$update_votes="UPDATE question SET upvote_count=upvote_count-1 WHERE q_id='$q_id'";
					$updated=$this->controller->updateQuery($update_votes);
				}
			}
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

		public function downvote($q_id,$user_id){
			$checkvote="SELECT * from vote_counts where user_id='$user_id' and q_id='$q_id'";
			$checked=$this->controller->numRows($checkvote);
			if ($checked==0){
				$insert_downvote="INSERT INTO vote_counts (`user_id`, `q_id`, `up_voted`, `down_voted`) VALUES ('$user_id','$q_id',0,1)";
				$update_votes="UPDATE question SET downvote_count=downvote_count+1 WHERE q_id='$q_id'";
				$updated=$this->controller->updateQuery($update_votes);
				$inserted=$this->controller->insertQuery($insert_downvote);
			}else{
				$getvote=$this->controller->runQuery($checkvote);
				if ($getvote[0]['down_voted']==0){
					$setone="UPDATE vote_counts SET down_voted=1,up_voted=0 WHERE q_id='$q_id' and user_id='$user_id'";
					$sett=$this->controller->updateQuery($setone);
					$update_votes="UPDATE question SET upvote_count=upvote_count-1,downvote_count=downvote_count+1 WHERE q_id='$q_id'";
					$updated=$this->controller->updateQuery($update_votes);
				}else{
					$setzero="UPDATE vote_counts SET down_voted=0,up_voted=0 WHERE q_id='$q_id' and user_id='$user_id'";
					$sett=$this->controller->updateQuery($setzero);
					$update_votes="UPDATE question SET downvote_count=downvote_count-1 WHERE q_id='$q_id'";
					$updated=$this->controller->updateQuery($update_votes);
				}
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

		public function addanswer($q_id,$user_id,$ans){
			$query="INSERT INTO answer (user_id,content,q_id)VALUES ('$user_id','$ans','$q_id')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function addnotification($auther){
			$query="INSERT INTO notification (user_id,notification)VALUES ('$auther','Your Question has been answered')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getauther($q_id){
			$query="SELECT user_id from question where q_id='$q_id'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function load_notification($user_id){
			$query="SELECT notification from notification where user_id = '$user_id' and status = '1'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function clear_notification($user_id){
			$query="UPDATE notification SET status=0 WHERE user_id='$user_id' ";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
	}

?>