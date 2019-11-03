<?php 
class connect {

	/**
	 * [$db description]
	 * @var [type]
	 */
	

	/**
	 * [$host description]
	 * @var [type]
	 */
	public $host;
d
	/**
	 * [$username description]
	 * @var [type]
	 */
	public $username;

	/**
	 * [$password description]
	 * @var [type]
	 */
	public $password;


	/**
	 * [$database description]
	 * @var [type]
	 */
	public $database;
private $db;

	/**
	 * [__construct description]
	 */
	public function __construct() {
		$host = $this->host;
		$username = $this->username;
		$password = $this->password;
		$database = $this->$database;
		$db = mysqli_connect($host, $username, $password, $database);
		if (! $db) {
			die('không kết nối được');
		}
		$this->db = $db;
	}

	/**
	 * [getConnect description]
	 * @return [type] [description]
	 */
	public function getConnect() {

		return $this->db;
	}

}
?>