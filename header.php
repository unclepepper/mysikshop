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
	<?php if(!isset($_GET['guitar']) and !isset($_GET['reg'])and !isset($_GET['klav'])){
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
		<div class="home">
				</div>
		<form action="?search" method="GET" class="form">
		
			<a href="?home" class="home"><img src="image/home.png" width="30" title="ДОМОЙ"></a>
			<input type="text" name="search" class="search" placeholder="Поиск...">
			<input type="submit" value="Найти" class="button">
		</form>
		<div class="right-heat-menu">

			<div class="basket">
				<a href="#"><img src="image/buy.png" width="30" title="Корзина"></a>
			<div class="alert"><p>1</p></div>
		</div>
				
				<div class="log-in"><a href="?reg"><img src="image/login.png" width="30" title="Авторизируйтесь"></a>
				</div>
				<div class="profile"><a href="#"><img src="image/punk.png" width="30" title="Ваш профиль"></a>
				</div>
				<div class="log-out"><a href="#"><img src="image/logout.png" width="30" title="Выйти"> </a>
				</div>
				 <div class="cust"><a href="?cust"><img src="image/setting.png" width="30" title="Настройки"></a>
				 </div>


		</div>
		
	</div>
<!-- hat end -->

