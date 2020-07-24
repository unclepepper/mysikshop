<?php
 if(isset($_COOKIE['auth']) == 'true') {
			$userid = $_COOKIE['userid'];
			}else{ $valtitle = 'classic';}
if(isset($_GET['name'])){
  $valtitle = $_GET['name'];
 
}

	$uri = $mysqli->query("SELECT * FROM `cat_product` WHERE `title_en` = '".$valtitle."' ");  
 $uri_prod = $uri->fetch_assoc(); 
 $res = $uri_prod['id_cat_product'];
 $cat_product = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_cat_product` = '".$res."'");
				 $link = $cat_product->fetch_assoc();
					$name = $mysqli->query("SELECT * FROM `product` WHERE `id_cat_product` = '".$res."'");
?>
	

			<div class="contain">
		
			<div class="wrap-cart">
				
				<!-- cart -->
					<?php foreach ($name as $v) {?>
				<div class="cart">
					<div class="front">

						<div class="h3"><h3><?=$v['title']?></h3></div>
						<div class="img-guitar"><img src="image/rand/<?=$v['img']?>" width="80%" height="20%" ></div>

					</div>
					<div class="back">		
							
						<div class="back-link">
							<span class="pay">20 620 ₽</span>
							<a href="?page/<?=$uri_prod['title_en']?>&name=<?=$v['title']?>" class="button-back">Подробнее...</a>
							<?php if(isset($_COOKIE['auth']) == 'true') {
								$userid = $_COOKIE['userid'];
							?>
							<a href="?category/&name=<?= $uri_prod['title_en']?>&basket=<?=$userid?>&nameprod=<?=$v['id_product']?>" class="button-back">В корзину </a> 
							<?php }?>
						</div>
							
						 
					</div>

					<!-- end cart -->
				</div>
				<?php }?>
			
				
			</div>
		
		</div>
	
	
	</div>