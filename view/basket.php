<?php
// require_once ('function/function.php');
if(isset($_GET['basket'])){
  $bask_id = $_GET['basket'];
 
}
if(isset($_COOKIE['auth']) == 'true') {
                $userid = $_COOKIE['userid'];
                }
$basket = $mysqli->query("SELECT * FROM `basket` WHERE `id_user` = '".$bask_id."'");
     $bask_ = $basket->fetch_assoc();
    // $bascket_user = $mysqli->query("SELECT * FROM `bastet`   WHERE `id_user` =  '".$basket."' "); 
    //     $uri_bask = $rand_img->fetch_assoc(); 
    if(isset($_GET['delete'])){
    if($_GET['delete']=='bask'){
      $id_prod = $_GET['prod'];
       
        $mysqli->query("DELETE  FROM `basket` WHERE `id_basket` = '".$id_prod."'");
         header('location:?basket='.$userid);
      }
    }     
?>
	

		  <div class="contain-catalog">
      <div class="admin">
       
        <div class="add-user">
      
      <div class="table-user">
         <h3>Корзина</h3>
         <div class="wrap-table">
               
                <table align="center" border="1" width="95%" >
                    <tr class="bn"><td class="bn">Удалить</td><td>Наименование</td>
                        <?php foreach($basket as $res){ ?> 
                   <tr><td class="bn">
                       
                   <a href='?basket&delete=bask&prod=<?=$bask_['id_basket']; ?>' class='delete' title="удаление"><img src='image/close1.png' width='20'></a></td><td>
                     
                    <?php echo $res['title']; ?></td></tr>
                    <?php } ?>
                </table>
        </div>
    <!-- wrap end... -->
      </div>
        </div>
        </div>
        </div>
