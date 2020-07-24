<?php 

 
	
		
$result = $mysqli->query("SELECT * FROM `category` "); 
// if(isset($_COOKIE['auth']) == 'true') 
//   $auth =  $_COOKIE['auth'];
//   $userid = $_COOKIE['userid'];
//   $useremail = $_COOKIE['useremail'];
//   $username = $_COOKIE['username'];
//   $usersurname = $_COOKIE['usersurname'];
if(isset($_GET['basket'])){
	if(isset($_GET['nameprod'])){
		$bask = $_GET['basket'];
		$basketproduct = $_GET['nameprod'];
		$basket = $mysqli->query("SELECT * FROM `basket` WHERE `id_user` = '".$bask."'");
		 $bask_ = $basket->fetch_assoc();
		$bask_prod = $mysqli->query("SELECT * FROM `product`   WHERE `id_product` =  '".$basketproduct."' "); 
       		 $basket_prod = $bask_prod->fetch_assoc(); 
		 $mysqli->query("INSERT INTO `basket`  VALUES (NULL, '".$basket_prod['title']."', '".$bask."', '".$basketproduct."')");
		
		
		  header('location:?home');

	}

}
if(isset($_GET['exit'])){
       
            unset($_COOKIE['auth']);
        SetCookie("auth", "", time()-3600); 
        unset($_COOKIE['username']);
        SetCookie("username", "", time()-3600); 
        unset($_COOKIE['useremail']);
        SetCookie("useremail", "", time()-3600); 
        unset($_COOKIE['userid']);
        SetCookie("userid", "", time()-3600); 
        unset($_COOKIE['usersurname']);
        SetCookie("usersurname", "", time()-3600); 
       if(isset($_GET['cust'])){
       	header('location:?type');
       }

     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rock&shop</title>
	 <link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Permanent+Marker&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> 
</head>
<body>
	<?php if(isset($_GET['type']) || isset($_GET['cust']) || isset($_GET['name']) ) {
				
			}else{
				include 'media.php';
			}
	?>

	<div class="hat marg-left marg-right">
		<div class="logo">
			<a href="?home" >
				<span  class="rock">Rock</span>
				<div>
					<img src="image/concert.png" width="30" class="and-top">
				</div>
				<span class="shop-top">Shop</span>
			 </a>	
		</div>
		<div class="home"></div>

		<form action="?search" method="GET" class="form">
		
			<a href="?home" class="home"><img src="image/home.png" width="30" title="ДОМОЙ"></a>
			<input type="text" name="search" class="search" placeholder="Поиск...">
			<input type="submit" value="Найти" class="button">
		</form>

		<div class="right-heat-menu">
		<?php if(isset($_COOKIE['auth']) == 'true') {
			$userid = $_COOKIE['userid'];
			 $count_bask = $mysqli->query("SELECT COUNT(*) as `c` FROM  `basket` WHERE `id_user` = '".$userid."'");
			 $total = mysqli_fetch_assoc($count_bask);
			
			?>
			<div class="basket">
					<a href="?basket=<?=$userid?>"><img src="image/buy.png" width="30" title="Корзина"></a>
					<?php if($total['c'] != 0){?>
				<div class="alert"><p><?=$total['c']?> </p></div>
			<?php }?>
			</div>
				
				<?php $res = urle(); ?>
			<div class="log-out"><a href="?<?php echo $res ?>&exit"><img src="image/logout.png" width="30" title="Выйти"> </a>
			</div>	
			<div class="cust"><a href="?cust"><img src="image/setting.png" width="30" title="Настройки"></a>
			 </div>
				<?php }else{ ?>
			<div class="log-in"><a href="?type"><img src="image/login.png" width="30" title="Авторизируйтесь"></a>
			</div>

				<?php } ?>
		</div>
		
	</div>
<!-- hat end -->
<?php
if(isset($_GET['type']) || isset($_GET['cust'])|| $uri_cle == 'page' || $uri_cle == 'basket' || isset($_GET['product'])|| isset($_GET['category'])){

}else{
	include('view/site_bar.php');

}
?>