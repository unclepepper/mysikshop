
<!-- content start -->
	<div class="wrap">

		<div class="site-bar">
			<div class="site-bar-links">
			<div class="links"><a href="?guitar">Гитары</a></div>
			<div class="links"><a href="?klav">Клавишные инструменты</a></div>
			<div class="links"><a href="#">Ударные инструменты</a></div>
			<div class="links"><a href="#">Смычковые и щипковые</a></div>
			<div class="links"><a href="#">Губные гармошки</a></div>
			<div class="links"><a href="#">Духовые инструменты</a></div>
			<div class="links"><a href="#">Аккордеоны и баяны</a></div>
		</div>
	</div>
		<?php if(isset($_GET['guitar'])){
					$guitar = $_GET['guitar'];
					include 'guitar.php';
				}else if(isset($_GET['klav'])){
					$klav = $_GET['klav'];
					include 'klav.php';
				}else{
					include 'home.php';
				}

					?>
				
		<!-- end wrap -->
	</div>
	
	
		
		


	