<?php 
$is_admin = 0;
if(isset($_COOKIE['auth']) == 'true') {
	$isadmin = $_COOKIE['isadmin'];
	$useremail = $_COOKIE['useremail'];
   $row = row($useremail);
   if($row['id_user']==1){
   		$id_user = $row['id_user'];
   		$admin = $mysqli->query("SELECT * FROM `users` WHERE `id_user` = '".$id_user."'");
		$is_admin = $admin->fetch_assoc();
   }
   
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


$result = $mysqli->query("SELECT  * FROM `users`");
$success_reg = ''; 
if($is_admin['is_admin']=='1') { 
if(isset($_GET['delete'])){
    if($_GET['delete']=='yes'){
        $user=$_GET['user'];
        $mysqli->query("DELETE  FROM `users` WHERE `id_user` = '".$user."'");
        $success_del = 'Пользователь удален!'; 
        header('location:?cust');
    }
}

}
?>
<!-- content start -->
	<?php if($isadmin != '1'){
		echo '<h2 class="alert-admin" ">Вы администратор? Авторизируйтесь!</h2>';
	}else{ ?>

		<div class="contain-catalog">
		
			<div class="admin">
				<h3>Панель администратора</h3>
				<div class="add-user">
					<form method="POST" class="reg-admin">
				
				 <?php
                    if($error_reg != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_reg.'</p>'; //Выводим ошибку
                    }else if($success_reg != null) { //
                        echo '<p>'.$success_reg .'</p>'; //
                    }else{
                    	 echo '<h3>Регистрация</h3>';
                    }
                    
                     ?>
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
       <?php if( $success_del != null ){
            echo '<h3>'.$success_del.'</h3>'; 
        }else{?>
        <h3>Пользователи сайта</h3>
        <?php } ?>

        <table align="center" border="1" width="95%" >
        <tr><td>Фамилия</td><td>Имя</td><td>email</td><td>Логин</td><td>Статус</td></tr>
       <?php foreach($result as $res){ ?> 
               <tr><td>
               <?php if($is_admin['is_admin']==1) {?>
               <a href='?cust&delete=yes&user=<?php echo $res['id_user']; ?>' class='delete' title="удалить пользователя  <?php echo $res['email']; ?> ?"><img src='image/close1.png' width='20'></a>
               <?php }?>
                <?php echo $res['surname']; ?></td><td><?php echo $res['name']; ?></td><td><?php echo $res['email']; ?></td><td><?php echo $res['email']; ?></td><td>
                <?php if($res['is_admin']==1){echo 'admin';}else{echo 'пользователь';} ?></td></tr>
        
            <?php } ?>
        </table>
    </div>
    <!-- wrap end... -->
			</div>
				</div>
				
			
		<div class="add-product">
			<form method="POST" class="reg-admin">
				 <?php
                    if($error_reg != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_reg.'</p>'; //Выводим ошибку
                    }else if($success_reg != null) { //
                        echo '<p>'.$success_reg .'</p>'; //
                    }else{
                    	 echo '<h3>Добавление товара</h3>';
                    }
                    
                     ?>
				<input type="hidden" name="add_product">
				<select >
					 <option disabled selected>Выберите товар</option>
					 <option>Гитары</option>
					<option>Клавишные</option>
					<option>Ударные установки</option>
					<option>Прочее</option>
				</select>
				<select >
					 <option disabled selected>Выберите категорию товара</option>
					 <option>Аустические</option>
					<option>Классические</option>
					<option>Электро гитары</option>
					<option>Бас гитары</option>
				</select>
					<input type="text" name="name_product" placeholder="Наименование">
					<input type="text" name="name_mark" placeholder="Производитель">
					<input type="text" name="name_mark" placeholder="Картинка товара">
					



				
			</form>
		</div>
		</div>
	
	</div>
		
		
<?php } ?>
