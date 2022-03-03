<?php
/**
 * Database
 */
class Database
{
	const HOST = "localhost";
	const USER = "root";
	const PASSWORD = "";
	const DATABASE = "no_name";
	
	public function connect(){
		$connect = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DATABASE);

		mysqli_set_charset($connect, "utf8");

		//kiểm tra xem connect được không
		if(mysqli_connect_errno() === 0){
			return $connect;
		}

		return false;
	}
}