<nav class="nav-pagination" aria-label="Page navigation example">
		<?php 
		if(isset($_REQUEST['controller'])){
			$controllerName = $_REQUEST['controller'];
		}
		echo '<ul class="pagination justify-content-center">';
		if($page > 1){
				echo '<li class="page-item">
			      <button class="btn btn-light">
			      	<a class="text-dark" href="'.$controllerName.'&page='.($page-1).'" aria-label="Previous">
			        <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
			      	</a>
			      </button>
			    </li>';
			}
			$avaiablePage = [1,$page-1,$page,$page+1, $number];
			$isFirst = $isLast = false;
		for ($i=1; $i <= $number; $i++) { 
			if(!in_array($i, $avaiablePage)){
				if(!$isFirst && $page > 3){
					echo '<li class="page-item">
						<button class="btn btn-dark">
							<a class="text-white" href="'.$controllerName.'&page='.($page-2).'">...</a>
						</button>
						</li>';
					$isFirst = true;
				}
				if(!$isLast && $i > $page){
					echo '<li class="page-item">
							<a class="page-link" href="'.$controllerName.'&page='.($page+2).'">
								<button class="btn btn-dark">...</button>
							</a>
					</li>';
					$isLast = true;
				}
				continue;
			}
			if($page == $i){
				echo '<li class="page-item active">
					<a class="text-white" href="#">
						<button class="btn btn-dark">'.$i.'</button>
					</a>
				</li>';
			}
			else{
				echo '<li class="page-item">
						<a class="text-dark" href="'.$controllerName.'&page='.$i.'">
							<button class="btn btn-light">'.$i.'</button>
						</a>
				</li>';
			}
		}
		if($page < $number){
				echo '<li class="page-item">
				      <a class="text-dark" href="'.$controllerName.'&page='.($page+1).'" aria-label="Next">
				      	<button class="btn btn-light">
				        	<span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
				        </button>
				      </a>
				    </li>';
			}
			echo '</ul>';
		?>
	</nav>
</main>