<script type="text/javascript">
	function delete<?=ucfirst($controllerName)?>(id){
		var option = confirm('Bạn chắc chắn muốn xóa mục này không?');
		if(!option){
			return;
		}
		//ajax
		$.post('<?=$controllerName?>&action=delete', {
			'id' : id,
			'action' : 'delete'
		},function (data){
			location.reload();
		})
	}
</script>