<?php require_once('Utility.php') ?>


<?php
class user{
	public $id;
	public $name;
	public $email;
	public $is_active;
	public $status;
	public $password;

	
	public function __construct(){
    	$this->utility= new Utility();
    }

    public function init($email,$password,$name,$status,$is_active){
        $this->email=$email;
        $this->password=$password;
        $this->name=$name;
        $this->is_active=$is_active;
        $this->status=$status;
    }

    public function adduser(){
		$result=$this->utility->adduser($this->email,$this->password,$this->name,$this->is_active,$this->status);
        return $result;
	}

    public function getBasicInfoByEmail($email){
        $result=$this->utility->getBasicInfoByEmail($email);
        if ($result){
            $this->id=$result[0]['id'];
            $this->name=$result[0]['username'];
            $this->email=$result[0]['email'];
            $this->status=$result[0]['type'];
            $this->is_active=$result[0]['isActive'];
            return true;
        }else{
            return false;
        }
    }

}