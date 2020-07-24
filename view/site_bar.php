<?php 



?>
<!-- content start -->
	<div class="wrap">

		<div class="site-bar">
			<div class="site-bar-links">

				<?php foreach ($result as $value) {?>
			<a class="links" href="?product/<?=$value['title_en']?>"><?=$value['title']?></a>
			<?php }?>
			
		</div>
	</div>
