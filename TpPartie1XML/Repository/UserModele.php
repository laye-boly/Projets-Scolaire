<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
class UserModele
{
	
	function findOneByEmailPassword($email, $password)
	{
		$connection = new Connection();
		$db = $connection->getConnection();
		$req = $db->prepare('SELECT * FROM user WHERE email = :mail AND password = :pass');
		$req->execute(array('mail' => $email, 'pass' => hash("sha256", $password)));


		return $req->fetch();
	}
}

