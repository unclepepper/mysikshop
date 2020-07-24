<?php 

$result = $mysqli->query("SELECT * FROM `cat_product` "); 
$result_cat = $mysqli->query("SELECT * FROM `category` ");
$cat_prod = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_category` = '".$cat_id."'");
    
 

 

    
?>
<!-- content start -->
	
		<!-- content start -->
			<div class="contain">
		
			<div class="wrap-cart">
				<!-- cart -->
				<?php foreach( $cat_prod as $key) {?>
				<div class="cart">
					<div class="front">
						
								<div class="h3"><h3><?= $key['title']?></h3></div>
								<?php $rand_img = $mysqli->query("SELECT * FROM `product`   WHERE `id_cat_product` = '".$key['id_cat_product']."'"); 
									 $n = $rand_img->fetch_assoc();
								?>
								<div class="img-guitar"><img src="../image/rand/<?= $n['img']?>" width="80%" height="20%" ></div>
						
					
						

					</div>
					<div class="back">
						<div class="back-link">
							
							<!-- <a href="?<?=$linkcat['title_en'].'/'.$link_product?>" class="button-back">Подробнее... </a> -->
							<a href="?category/&name=<?= $key['title_en']?>" class="button-back">Смотреть</a> 
						</div>
						
					</div>
					<!-- end cart -->
				</div>
				<?php }?>
					<!-- end cart -->
				</div>
			</div>
		
		</div>
	
				
		<!-- end wrap -->
	</div>
	
	
		
		


	