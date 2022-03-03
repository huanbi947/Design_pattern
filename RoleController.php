<?php

class RoleController extends BaseController
{
	const LIMIT = 5;
	private $table;
	private $roleModel;

	public function __construct(){
		$this->loadModel('RoleModel');
		$this->roleModel = new RoleModel();
	}

	public function index()
	{
		$selectColumn = [
			'id_role',
			'name_role'];
		$order = [
			'column' => 'id_role',
			'order' => 'asc'
		];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$role = $this->roleModel->selectAllRole($selectColumn, $order);

			$count = count($role);
			$number = ceil($count/self::LIMIT);

			$page = $this->getGet('page');
			if($page>$number || $page<0 || empty($_GET['page'])){
				$page = 1;
			}
			$firstIndex = ($page-1)*self::LIMIT;
			$role = $this->roleModel->paging(self::LIMIT, $page);
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.roles.index',[
				'role' => $role,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);
			$this->includeView('layout.scriptDelete', [
				'controllerName' => $this->table = 'role'
			]);
			$this->includeView('layout.searchFilter');
		}
		else{
			header("Location: login");
			die();
		}
	}

	public function add(){
		$data = [];
		$values = [];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(!empty($_POST)){
				$title = $this->getPost('title');
				$data[] = $title;
				$values[] = $title;
				$id = $this->getPost('id');
        
				if(!empty($title)){
					$selectColumn = [
						'name_role',
					];
					$column = [
						'name_role',
					];
					if($id == ''){
						$insertCate = $this->roleModel->insertrole($selectColumn,$data);
					}
					else{
						$update = $this->roleModel->updaterole($column, $values, $id);
					}
					header("Location: role");
				}
				else{
					echo "<div class='alert alert-warning fixed-bottom' role='alert'>Thêm thất bại!</div>";
				}
			}
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$item = $this->roleModel->selectroleById($id);
				
				$this->includeView('layout.admin_header');
				$this->includeView('layout.nav');
				return $this->loadView('front.roles.add',[
					'item' => $item
				]);
			}
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			return $this->loadView('front.roles.add');
		}
		else{
			header("Location: login");
			die();
		}
	}
	public function delete(){
		$id = '';
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$deleteByID = $this->roleModel->deleteRoleById($id);
			}
		}
		else{
			header("Location: login");
			die();
		}
	}
}