<?php 

include 'header.php';?>
<!-- hat end -->


<!-- content start -->

<?php 
	
		
	
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);

		if(isset($_GET['search'])){
			$search = $_GET['search'];
			include 'view/search.php';
		}else if(isset($_GET['reg'])){
			$reg = $_GET['reg'];
			include 'view/registr.php';
		 
		}else if(isset($_GET['cust'])){
				$cust = $_GET['cust'];
			include 'view/cust.php';
				
			}else  if(isset($_GET['home'])){
				$home = $_GET['home'];
				include 'view/content.php';
				
		
			}else {
            include 'view/content.php';
             			 // header('location:?home');               
			}
		
		
	 
		
			


?>
	

		<!-- footer -->
<?php include 'footer.php';?>