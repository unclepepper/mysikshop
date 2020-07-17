<?php 
 $result = $mysqli->query("SELECT * FROM `category` "); 
	$rand = $mysqli->query("SELECT * FROM `product` ORDER BY RAND() LIMIT 12 "); 



?>
<!-- content start -->
	<div class="wrap">

		<div class="site-bar">
			<div class="site-bar-links">

				<?php foreach ($result as $value) {?>
			<a class="links" href="?<?=$value['title_en']?>"><?=$value['title']?></a>
			<?php }?>
			
		</div>
	</div>
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
							 <!-- <li><a href="?guitar/<?=$val['title_en']?>"><?=$val['title']?></a></li> -->
						
							<a href="?" class="button">В корзину </a> 
							<a href="?<?=$linkcat['title_en'].'/'.$link_product?>" class="button">Смотреть больше </a>
						
						 
					</div>

					<!-- end cart -->
				</div>
				<?php }?>
				
			</div>
		
		</div>
	
	
	</div>
	
	
		
		


	