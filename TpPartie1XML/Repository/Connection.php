<?php 
class Connection {
	private $db;

	public function getConnection()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=tpxml1;charset=utf8', 'root', '');
		return $this->db;
	}
}