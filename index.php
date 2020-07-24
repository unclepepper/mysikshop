<?php 
require_once ('function/function.php');
$mysqli = new mysqli('localhost', 'root', '', 'rock_shop'); //Создаем подключение к базе данных
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
$res = urle();

		 $produc = preg_replace('"[A-z]*\/"', '', $res);
		 $produc = preg_replace('"="', '', $produc);
		$uri_cle = preg_replace('"/[A-z]*.*"','', $res);
		 $uri_cle = preg_replace('"[0-9]*"', '', $uri_cle);
		
		   // echo  $res;

	$cat_url = $mysqli->query("SELECT * FROM `category` WHERE `title_en` = '".$product."'");
         $all = $cat_url->fetch_assoc();
        $cat_id =  $all['id_category'];


include 'header.php';




?>
<!-- hat end -->


<!-- content start -->

<?php 
	
		
	
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);


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
				}else if($_GET['delete']=='bask'){
					if(isset($_GET['prod'])){
						$product = $_GET['prod'];
						if($res == 'basketbask'.$product){
							 include 'view/basket.php';
						}
					}
				}		
       
    	}
		
		if($res !== '/'){
			
				if(file_exists("view/".$uri_cle.".php")){
				include "view/".$uri_cle.".php";
			}else {

            include 'view/product.php';
			
			}     
			
			
		}else {
            // include 'view/home.php';
             			  header('location:?home');  
			           
			}
		
		
	 
		
			


?>
	

		<!-- footer -->
<?php include 'footer.php';?>