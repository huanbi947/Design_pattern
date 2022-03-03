<main class="col-10">
	<center class="mt-2"><h1>Quản lý chức vụ</h1></center>
	<section>
		<div class="d-flex mt-2">
			<div class="container-fluid">
				<a href="role&action=add" ><button class="btn btn-success">Thêm chức vụ</button></a>
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" 
                 placeholder="Search..." aria-label="Search" name="s" id="myInput">
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr>
				      <th scope="col" style="width: 10rem">#</th>
				      <th scope="col">Chức vụ</th>
				      <th scope="col" style="width: 3rem"></th>
				      <th scope="col" style="width: 3rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
					$firstIndex=0;
					foreach ($role as $item){
						echo '<tr class="border-left border-right border-bottom">
								<th scope="col">'.++$firstIndex.'</th>
								<td scope="col">'.$item['name_role'].'</td>
								<th scope="col">
									<a href="role&action=add&id='.$item['id_role'].'">
										<button class="btn btn-primary text-white">
											<i class="far fa-edit"></i>
										</button>
									</a>
								</th>
								<th scope="col">
									<button class="btn btn-danger " onclick="deleteRole('.$item['id_role'].')">
										<i class="far fa-trash-alt"></i>
									</button>
								</th>
							</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</section>