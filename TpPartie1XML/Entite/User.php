<?php
class User 
{
	
	private $email;
	private $password;
	private $status;
	function __construct($email, $password, $status)
	{
		$this->email = $email;
		$this->password = $password;
		$this->status = $status;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPassword($password){
		$this->$password = $password;
	}

	public function getPassword(){
		return $this->password;
	}
	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}