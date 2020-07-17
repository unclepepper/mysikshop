<?php 
require_once ('function/function.php');
$mysqli = new mysqli('localhost', 'root', '', 'rock_shop'); //Создаем подключение к базе данных
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

include 'header.php';
?>
<!-- hat end -->


<!-- content start -->

<?php 
	
		
	
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);




	

		$res = urle();
		// echo $res;

		if(isset($_GET['delete'])){
				if($_GET['delete']=='us'){
					if(isset($_GET['user'])){
				$user=$_GET['user'];
				if($res == 'custus'.$user){
					 include 'view/cust.php';
					} 
				}		
				
			}else if($_GET['delete']=='prod'){
					if(isset($_GET['product'])){
						$product = $_GET['product'];
						if($res == 'custprod'.$product){
							 include 'view/cust.php';
						}
					}
				}	
       
    	}
		
		if($res !== '/'){
			
				if(file_exists("view/".$res.".php")){
				include "view/".$res.".php";
			}else {
            include 'view/home.php';
			
			}     
			
			
		}else {
            // include 'view/home.php';
             			  header('location:?home');  
			           
			}
		
		
	 
		
			


?>
	

		<!-- footer -->
<?php include 'footer.php';?>