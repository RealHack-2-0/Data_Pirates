<?php require_once('Utility.php') ?>


<?php
class user{
	public $id;
	public $name;
	public $email;
	public $is_active;
	public $status;

	
	public function __construct(){
    	$this->utility= new Utility();
    }

    public function init($email,$password,$name,$status,$is_active,$token){
        $this->email=$email;
        $this->password=$password;
        $this->name=$name;
        $this->is_active=$is_active;
        $this->status=$status;
        $this->$token;
    }

    public function adduser(){
		$result=$this->utility->adduser($this->email,$this->password,$this->name,$this->is_active);
        return $result;
	}



}