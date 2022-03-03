<div class="container">
	<center class="mt-2"><h1>Thêm/Sửa chức vụ</h1></center>
	<form method="POST">
		<div class="form-group">
			<label for="email">Chức vụ:</label>
			<input type="number" name="id" value="<?=$item['id_role']?>" hidden="true">
			<?php
			if(isset($_GET['id'])){
				echo '<input type="text" class="form-control" id="email" value="'.$item['name_role'].'" placeholder="" name="title">';
			}
			else{
				echo '<input type="text" class="form-control" id="email" placeholder="" name="title" required>';
			}
			?>
		</div>
		<button type="submit" class="btn btn-success">Lưu</button>
	</form>
</div>