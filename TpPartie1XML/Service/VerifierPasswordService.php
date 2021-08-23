<?php

class VerifierPasswordService 

{
	public function verifierPassword($password){

		$lettre = preg_match('#[A-Za-z]#', $password);
		$nombre  = preg_match('#[0-9]#', $password);
		$caractereSpecial = preg_match('#[^\w]#', $password);

		if(!$lettre || !$nombre || !$caractereSpecial || strlen($password) < 6) {
			return false;
		}

		return true;
	}
}