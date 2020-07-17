<?php 

if(isset($_COOKIE['auth']) == 'true') {
	$isadmin = $_COOKIE['isadmin'];
	$useremail = $_COOKIE['useremail'];
    $username = $_COOKIE['username'];
    $usersurname = $_COOKIE['usersurname'];
   $row = row($useremail);
   if($row['id_user']==1){
   		$id_user = $row['id_user'];
   		$admin = $mysqli->query("SELECT * FROM `users` WHERE `id_user` = '".$id_user."'");
		$is_admin = $admin->fetch_assoc();
   }
   
}else{
    $isadmin = 0;
}
	function formastr($str) {
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
	
    $error_auth = ''; //Текст ошибки для авторизации
    $error_reg = ''; //Текст ошибки для регистрации
    $success_auth = ''; 
    $success_reg = ''; 
    $success_del = '';
 
	 if(isset($_POST['type'])){
	 	$type = $_POST['type']; //Получаем тип запроса
	 }

      
 if(isset($_POST['type'])){
    if($type == 'reg') {
       		$date = $_POST['date'];
       		$is_admin = $_POST['is_admin'];
            $email = $_POST['email']; //Получаем почту
            $password = $_POST['pass']; //Получаем пароль
            $password_re = $_POST['pass_re']; //Получаем пароль 2
            $name = $_POST['name']; //Получаем имя
            $surname = $_POST['surname']; //Получаем фамилию
        if($email != '' and $password != '' ){
            if($password == $password_re) {
                $insert = $mysqli->query("INSERT INTO `users` (`id_user`, `email`, `pass`, `name`,`surname`,`date`,`is_admin`) VALUES (NULL, '".$email."', '".$password."', '".$name."', '".$surname."','".$date."','".$is_admin."')");
                $success_reg = 'Пользователь '. $email . ' зарегистрирован!' ;
            } else {
                $error_reg = 'Пароли не сходятся';
            }
        
        }else {
            $error_reg = 'Введите хоть что-нибудь!';
        }
        
    } else{
        $error_reg = '';
        $success_reg = ''; 
    }
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        header('Location: /search.php?search='.$search);  
    }
}
// добавление товара
 $message_add_product = '';
if(isset($_POST['add_product'])){
    if(isset($_POST['id_cat_product']) and isset($_POST['add_product']) and isset($_POST['name_product']) and isset($_POST['desc']) ){

         $idcatprod = $_POST['id_cat_product'];
        $catproduct = $_POST['add_product'] ;
        $nameproduct = $_POST['name_product'];
        $desc = $_POST['desc'];
        $nameimg = $_POST['name_img'];
      
        $idcatproduct = $mysqli->query("SELECT * FROM `cat_product` WHERE `title_en` = '".$idcatprod."'");
         $numcatprod = $idcatproduct->fetch_assoc();
         
        $idcat = $mysqli->query("SELECT * FROM `category` WHERE `title` = '".$catproduct."'");
         $numcat = $idcat->fetch_assoc();

         $ins_prod = $mysqli->query("INSERT INTO `product`  VALUES (NULL, '".$nameproduct."', '".$numcat['id_category']."', '".$desc."', '".$nameimg."', '".$numcatprod['id_cat_product']."')");
          header('location:?cust');
    } else{
        $message_add_product = 'Заполните все поля!';
    }
}

// конец добавления 

$result = $mysqli->query("SELECT  * FROM `users`");
$cat = $mysqli->query("SELECT  * FROM `category`");
$prod = $mysqli->query("SELECT  * FROM `product`");


$success_reg = ''; 

if(isset($_GET['delete'])){
    if($_GET['delete']=='us'){
    	if($is_admin['is_admin']== 1) { 
        $user=$_GET['user'];
        $mysqli->query("DELETE  FROM `users` WHERE `id_user` = '".$user."'");
        header('location:?cust');
    }
    }else if($_GET['delete']=='prod'){
        if($is_admin['is_admin']== 1) { 
        $product=$_GET['product'];
        $mysqli->query("DELETE  FROM `product` WHERE `id_product` = '".$product."'");
        header('location:?cust');
    }
}

}
  if(isset($_POST['select'])){

    $cat_name = $mysqli->query("SELECT * FROM `category` WHERE `id_category` = '".$_POST['select']."'");
    $alar = $cat_name->fetch_assoc();
   $alarm = $alar['title'];
}else{
     $alarm ='Выберите категорию товара';

}
?>
<!-- content start -->

<?php 
	if($isadmin != '1' ){
		echo '<h2 class="alert-admin" ">Вы администратор? Авторизируйтесь!</h2>';
	}else{ ?>

		<div class="contain-catalog">
		
			<div class="admin">
				<h3>Панель администратора <?= $username. ' ' . $usersurname?></h3>
				<div class="add-user">
				<form method="POST" class="reg-admin">
				
				 <?php
                    if($error_reg != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_reg.'</p>'; //Выводим ошибку
                    }else if($success_reg != null) { //
                        echo '<p>'.$success_reg .'</p>'; //
                    }else{
                    	 echo '<h3>Регистрация</h3>';
                    
                    
                     }?>
				<input type="hidden" name="type" value="reg">
				<input type="text" name="name" placeholder="Введите имя">
				<input type="text" name="surname" placeholder="Введите фамилию">
				<input type="email" name="email" placeholder="Введите email">
				<input type="password" name="pass" placeholder="Введите пароль">
				<input type="password" name="pass_re" placeholder="Повторите пароль">
				<input type="date" name="date">	
				<input type="text" name="is_admin" placeholder="admin">
				<input type="submit" value="Зарегистрировать" class="but-reg">
			</form>

			<div class="table-user">
				 <div class="wrap-table">
        <h3>Пользователи сайта</h3>
        <table align="center" border="1" width="95%" >
        <tr><td>Удаление</td><td>Фамилия</td><td>Имя</td><td>email</td><td>Пароль</td><td>Статус</td></tr>
       <?php foreach($result as $res){ ?> 
               <tr><td>
               <?php if($isadmin == 1) {?>
               <a href='?cust&delete=us&user=<?php echo $res['id_user']; ?>' class='delete' title="удаление пользователя  <?php echo $res['email']; ?>"><img src='image/close1.png' width='20'></a></td><td>
               <?php }?>
                <?php echo $res['surname']; ?></td><td><?php echo $res['name']; ?></td><td><?php echo $res['email']; ?></td><td><?php echo $res['pass']; ?></td><td>
                <?php if($res['is_admin']==1){echo 'admin';}else{echo 'user';} ?></td></tr>
        
            <?php } ?>
        </table>
    </div>
    <!-- wrap end... -->
			</div>
				</div>
				
			
		<div class="add-product" id="add-product">
			<form method="POST" class="reg-admin">
				 <?php
                    if($message_add_product != null) {
                        echo '<p>'.$message_add_product.'</p>'; 
                    }else{
                    	 echo '<h3>Добавление товара</h3>';
                    }
                    
                     ?>
				
				<select name="select" onchange="this.form.submit()">
					 <option disabled selected><?= $alarm?></option>
                     <?php foreach ($cat as $value) {
                            
                        ?>
					 <option value='<?=$value['id_category'] ?>'><?=$value['title'] ?></option>
                     <?php  }?>
                      </select>
                        
                            <?php if(isset($_POST['select'])){
                             $select=$_POST['select'];
                            $cat_product = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_category` = '".$select."'");?>
                        <input type="hidden" name="add_product" value="<?=$alarm?>">
                        <select name="id_cat_product">
                            <option disabled selected>Выберите вид товара</option>
                             <?php foreach ($cat_product as $val) {  ?>
                            <option value="<?=$val['title_en']?>"><?=$val['title']?></option>        
                    <?php }?>
  
                        </select>
        					<input type="text" name="name_product" placeholder="Наименование">
                            <textarea name="desc" placeholder="Описание товара"></textarea> 
                            <input type="text" name="name_img" placeholder="Название картинки к товару">
                            <input type="submit" value="Добавить" class="but-reg">
				 <?php  }?>
					
					
			</form>
			<div class="table-user">
				 <div class="wrap-table">
       
        <h3>Товары магазина</h3>
       

        <table align="center" border="1" width="95%" >
        <tr><td>Удаление</td><td>Наименование</td><td>Категория</td><td>Вид</td><td>Название картинки</td></tr>
       <?php foreach($prod as $table){

        $tab_cat_product = $mysqli->query("SELECT * FROM `cat_product` WHERE `id_cat_product` = '".$table['id_cat_product']."'");
       $table_cat_product = $tab_cat_product->fetch_assoc();
       $tab_cat = $mysqli->query("SELECT * FROM `category` WHERE `id_category` = '".$table['id_category']."'");
       $table_cat = $tab_cat->fetch_assoc();
         ?>
               <tr><td>
               <?php if($isadmin == 1) {?>
               <a href='?cust&delete=prod&product=<?php echo $table['id_product']; ?>' class='delete' title="удаление   <?php echo $table['title']; ?>"><img src='image/close1.png' width='20'></a></td><td>
               <?php }?>
                <?php echo $table['title']; ?></td><td><?php echo  $table_cat['title']; ?></td><td><?=$table_cat_product['title']; ?></td><td><?= $table['img']?></td></tr>
        
            <?php } ?>
        </table>
    </div>
    <!-- wrap end... -->
			</div>
		</div>
		</div>
	
	</div>
		
		
<?php } ?>
