<?php
class BaseModel extends Database
{
	protected $connect;

	public function __construct(){
		$this->connect = $this->connect();
	}
  
  public function select($table, $select = ['*'], $orderBys = []){
		$columns = implode(',', $select);
		$orderByString = implode(' ', $orderBys);
		if($orderByString){
			$sql = "SELECT ${columns} FROM ${table} ORDER BY ${orderByString}";
		}else{
			$sql = "SELECT ${columns} FROM ${table}";
		}

		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}
  
  public function selectById($table, $id){
		$sql = "SELECT * FROM ${table} WHERE id_${table} = ${id}";

		$query = $this->_query($sql);
		$data = null;
		if($query != null){
			$data = mysqli_fetch_array($query, 1);
		}
		return $data;
	}
  
  public function insert($table, $select = [''], $data = ['']){
		$columns = implode(",", $select); 
		$values = implode("','", $data);
		$sql = "INSERT INTO ${table}($columns) VALUES ('${values}');";

		$query = $this->_query($sql);
	}
  
  public function delete($table, $id){
		$sql = "DELETE FROM ${table} where id_${table} = ${id}";
		$query = $this->_query($sql);
	}
  
  public function update($table, $select = [''], $data = [''], $id){
		function combined($n, $m){
			return "${n} = '${m}'";
		}
		$unite = array_map('combined', $select, $data);
		
		$final = implode(",", $unite);

		$sql = "UPDATE ${table} SET ${final} WHERE id_${table} = ${id}";

		$query = $this->_query($sql);
	}
  
  public function pagination($table, $limit, $page){
		$firstIndex = ($page-1)*$limit;

		$sql = "SELECT * FROM ${table} where 1 limit ${firstIndex} , ${limit}";
		
		$query = $this->_query($sql);
		$data = [];
		if($query != null){
			while($row = mysqli_fetch_array($query, 1))
			{
				$data[] = $row;
			}
		}
		return $data;
	}
  
  public function _query($sql){
		return mysqli_query($this->connect, $sql);
	}
}