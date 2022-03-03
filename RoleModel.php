<?php
class RoleModel extends BaseModel
{
	const TABLE = 'role';

	public function selectAllRole($select = ['*'], $orderBys=[]){
		return $this->select(self::TABLE, $select, $orderBys);
	}
	public function paging($limit, $page){
		return $this->pagination(self::TABLE, $limit, $page);
	}
	public function selectRoleById($id){
		return $this->selectById(self::TABLE, $id);
	}
	public function insertRole($select = [''], $data = ['']){
		return $this->insert(self::TABLE, $select, $data);
	}
	public function deleteRoleById($id){
		return $this->delete(self::TABLE, $id);
	}
	public function updateRole($select = [''], $data = [''], $id){
		return $this->update(self::TABLE, $select, $data, $id);
	}
}