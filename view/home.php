<?php 

	$rand = $mysqli->query("SELECT * FROM `product` ORDER BY RAND() LIMIT 9 ");
	$uri = $mysqli->query("SELECT * FROM `cat_product` WHERE `title_en` = '".$produc."' ");  
 $uri_prod = $uri->fetch_assoc();
 // $uri_prod = $mysqli->query("SELECT * FROM `product` WHERE `title_en` = '".$product."' "); 

?>

	<!-- content start -->
	
		<div class="contain">
		
			<div class="wrap-cart">
				<?php foreach ($rand as $value) {
					$res = $value['id_cat_product'];
					$cat_product = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_cat_product` = '".$res."'");
				 $link = $cat_product->fetch_assoc();
				 $link_product = $link['title_en'];
					$catid = $mysqli->query("SELECT * FROM `category` WHERE `id_category` = '".$link['id_category']."'");
				 $linkcat = $catid->fetch_assoc();
				
				
					?>
				<!-- cart -->
				<div class="cart">
					<div class="front">
						<div class="h3"><h3><?=$value['title']?></h3></div>
						<div class="img-guitar"><img src="image/rand/<?=$value['img']?>" width="80%" height="20%" ></div>

					</div>
					<div class="back">		
							
						<div class="back-link">
							<span class="pay">20 620 ₽</span>
							<a href="?page/<?=$uri_prod['title_en'].$link_product?>/<?=$uri_prod['title']?>&name=<?=$value['title']?>" class="button-back">Подробнее...</a>
							<?php if(isset($_COOKIE['auth']) == 'true') {
								$userid = $_COOKIE['userid'];
							?>
							<a href="?home/&basket=<?=$userid?>&nameprod=<?=$value['id_product']?>" class="button-back">В корзину </a> 
						<?php }?>
						</div>
							
						 
					</div>

					<!-- end cart -->
				</div>
				<?php }?>
				
			</div>
		
		</div>
	
	
	</div>
	
	
		
		


	