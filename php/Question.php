<?php require_once('Utility.php') ?>

<?php
class Question{
	private $id;
	private $auther;
	private $question;


	public function __construct(){
    	$this->utility= new Utility();
    }

     public function init($question,$auther){
        $this->question=$question;
        $this->password=$password;
    }

    


}



?>