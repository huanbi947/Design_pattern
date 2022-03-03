<body class="d-flex flex-column">
<nav class="navbar-dark bg-dark d-flex">
	<div class="d-flex ml-2 pl-4">
		<a href="home" class="navbar-brand m-0">
			<img src="./assets/image/NoNameee-01.png" class="rounded" style="width:3rem; height:2.5rem; background-color: #fafafa">
		</a>
	</div>
	<div class="d-flex flex-fill justify-content-end">
		<?php
			if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['username'])){
				if(isset($_SESSION['username'])){
					$sessionUser = $_SESSION['username'];
				}
				echo '<div class="dropdown ml-3 mr-3 pt-1">
					<button class="btn rounded-circle" type="button" id="dropdownMenuButton" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #ff4f04">
							<strong class="text-white">'.$sessionUser[0].'</strong>
					</button>
					<div class="dropdown-menu m-0">
						<a class="dropdown-item" href="login&action=logout">Đăng xuất</a>
					</div>
				</div>';
			}
			else{
				echo '<div class="d-flex pl-2">
					<a href="login">
						<i class="fas fa-user fa-2x text-dark"></i>
					</a>
				</div>';
			}
		?>
	</div>
</nav>
<section class="d-flex flex-fill" id="wrapper">
	<nav class="col-2 navbar-dark bg-dark navbar-fixed-left pt-3" id="sidebar-wrapper">
		
		<ul class="container-fluid p-0 nav nav-tabs flex-column">
		<?php
		$data = ['category','product','account', 'role', 'stock', 'order'];
		$title = ['danh mục', 'sản phẩm', 'tài khoản', 'chức vụ', 'kho hàng', 'đơn hàng'];

		if(isset($_REQUEST['controller'])){
			$controllerName = $_REQUEST['controller'];
			$key = array_search($controllerName, $data);
			$replace = array($key => '');
			$data = array_replace($data, $replace);
			for($i=0; $i<count($data); $i++){
				if($data[$i]!=''){
					echo '<li class="nav-item">
						<a class="nav-link text-white rounded" href="'.$data[$i].'">Quản lý '.$title[$i].'</a>
						</li>';
				}
				else{
					if(isset($_REQUEST['action'])){
						echo '<li class="nav-item">
							<a class="nav-link rounded active" href="'.$controllerName.'">Quản lý '.$title[$i].'</a>
							</li>';
					}
					else{
						echo '<li class="nav-item">
							<a class="nav-link rounded active" href="">Quản lý '.$title[$i].'</a>
						</li>';
					}
				}
			}
		}
		?>
		</ul>
	</nav>