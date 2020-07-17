<?php 
$result = $mysqli->query("SELECT * FROM `cat_product` "); 

?>
<!-- content start -->
	<div class="wrap">

		<div class="site-bar">			
			<div class="site-bar-links">
					<?php foreach ($result as $value) {?>
			<a class="links" href="?guitar/<?=$value['title_en']?>"><?=$value['title']?></a>
			<?php }?>
			<!-- <a class="links" href="?guitar/classic">Классические гитары</a>
			<a class="links" href="guitar/current">Электро гитары</a>
			<a class="links" href="?guitar/bass">Бас гитары</a>
			<a class="links" href="?guitar/proc">Процессоры</a> -->
		</div>
	</div>
		<!-- content start -->
			<div class="contain">
		
			<div class="wrap-cart">
				<!-- cart -->
				<div class="cart">
					<div class="front">
						<div class="h3"><h3>Акустические гитары</h3></div>
						<div class="img-guitar"><img src="image/guitar/acustic.png" width="80%" height="20%" ></div>

					</div>
					<div class="back">
						<ul>
							 <li><a href="?home">Классические </a></li>
							 <li><a href="#">Акустические </a></li>
							 <li><a href="#">Электро гитары</a></li>
							 <li><a href="#">Бас-гитары</a></li>
							 <li><a href="#">Процессоры </a></li>
							 <li><a href="#">Бас-гитары</a></li>


						</ul>
						
					</div>
					<!-- end cart -->
				</div>
				<div class="cart">
					<div class="front">
						<div class="h3"><h3>Классические </h3></div>
						<div class="img-guitar"><img src="image/guitar/classic.png" width="80%" height="20%"></div>

					</div>
					<div class="back">
						<ul>
							 <li><a href="#">Классические гитары</a></li>
							 <li><a href="#">Акустические гитары</a></li>
							 <li><a href="#">Электро гитары</a></li>
							 <li><a href="#">Бас-гитары</a></li>
							 <li><a href="#">Процессоры и педали эффектов</a></li>
							 <li><a href="#">Бас-гитары</a></li>


						</ul>
						
					</div>
					<!-- end cart -->
				</div>
				<div class="cart">
					<div class="front">
						<div class="h3"><h3>Электро гитары</h3></div>
						<div class="img-guitar"><img src="image/guitar/current.png" width="80%" height="20%"></div>

					</div>
					<div class="back">
						<ul>
							 <li><a href="#">Классические гитары</a></li>
							 <li><a href="#">Акустические гитары</a></li>
							 <li><a href="#">Электро гитары</a></li>
							 <li><a href="#">Бас-гитары</a></li>
							 <li><a href="#">Процессоры и педали эффектов</a></li>
							 <li><a href="#">Бас-гитары</a></li>


						</ul>
						
					</div>
					<!-- end cart -->
				</div>
				<div class="cart">
					<div class="front">
						<div class="h3"><h3>Бас-гитары</h3></div>
						<div class="img-guitar"><img src="image/guitar/bass.png" width="80%" height="20%"></div>

					</div>
					<div class="back">
						<ul>
							 <li><a href="#">Классические гитары</a></li>
							 <li><a href="#">Акустические гитары</a></li>
							 <li><a href="#">Электро гитары</a></li>
							 <li><a href="#">Бас-гитары</a></li>
							 <li><a href="#">Процессоры и педали эффектов</a></li>
							 <li><a href="#">Бас-гитары</a></li>


						</ul>
						
					</div>
					<!-- end cart -->
				</div>
				<div class="cart">
					<div class="front">
						<div class="h3"><h3>Процессоры</h3></div>
						<div class="img-guitar"><img src="image/guitar/proc.png" width="80%" height="20%"></div>

					</div>
					<div class="back">
						<ul>
							 <li><a href="#">Классические гитары</a></li>
							 <li><a href="#">Акустические гитары</a></li>
							 <li><a href="#">Электро гитары</a></li>
							 <li><a href="#">Бас-гитары</a></li>
							 <li><a href="#">Процессоры и педали эффектов</a></li>
							 <li><a href="#">Бас-гитары</a></li>


						</ul>
						
					</div>
					<!-- end cart -->
				</div>
			</div>
		
		</div>
	
				
		<!-- end wrap -->
	</div>
	
	
		
		


	