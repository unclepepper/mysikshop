<?php

if(isset($_GET['name'])){
  $valtitle = $_GET['name'];
 
}
 
 
    $rand_img = $mysqli->query("SELECT * FROM `product`   WHERE `title` =  '".$valtitle."' "); 
        $uri_prod = $rand_img->fetch_assoc();   
           
?>
	

		<div class="contain-catalog">
			<div class="product">
      <div class="sect-product">
        <h3><?=$uri_prod['title']?></h3>
        <img src="../image/rand/<?=$uri_prod['img']?>" class="img-product">
      </div>
				<div class="sect-desc">
          <div class="price"><span>Цена:</span> <span style="font-weight: bold;color:red;">20 620 ₽</span></div>
               <p><?=$uri_prod['description']?></p> 
               <?php $uri = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_cat_product` = '".$uri_prod['id_cat_product']."' ");
                $uri_cat = $uri->fetch_assoc();
               ?> 
               <div class="but">
                <?php if(isset($_COOKIE['auth']) == 'true') {
                $userid = $_COOKIE['userid'];
              ?>
                <a href="?page/<?=$uri_cat['title_en']?>/&name=<?=$uri_prod['title']?>&basket=<?=$userid?>&nameprod=<?=$uri_prod['id_product']?>" class="button">В корзину</a> 
              <?php }?>
              </div>
        </div>
       
				</div>
      </div>