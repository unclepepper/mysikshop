
	<footer class="footer">
		<div class="foot-info"><p>Все права защищены &copy;</p>
		<p>Тюмень, 2020.</p>
		</div>
		<div class="foot-menu">
			<div><a href="#">О нас</a></div>
			<div><a href="#">Контакты</a></div>
			<?php if(isset($_COOKIE['auth']) == 'true') {?>
			<div><a href="?cust">Настройки</a></div>
		<?php } ?>
		</div>
		<div class="media-logo">
			<span  class="rock-bot">Rock</span><img src="image/concert.png" width="40" class="and"><span class="shop-bot">Shop</span>
		</div>
		
		
		


	</footer>
</body>
</html>