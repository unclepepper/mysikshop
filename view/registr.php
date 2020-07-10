<?php 
if(isset($_COOKIE['auth']) == 'true') { //Получаем куки и проверяем авторизован ли пользователь
      header('Location: http://as-ps.ru/?home');  //Если авторизован, то перенаправляем на главную страницу
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
 
	 if(isset($_GET['type'])){
	 	$type = $_GET['type']; //Получаем тип запроса
	 }
    

                
    if($type == 'auth') { //Если тип запроса 'auth' тогда проверяем почту и пароль для авторизации пользователя
       
        $email = formastr($_GET['email']); //Получаем почту пользователя
        $password = formastr($_GET['pass']); //Получаем пароль пользователя
        if($email != NULL or $password != NULL){
            $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '".$email."'"); //Выполняем запрос на получение информации о пользователе по почте
            $row = $result->fetch_assoc(); //Извлекаем массив с данными пользователя
            //Проверяем сходится ли пароль из базы данных с паролем который ввел пользователь
                if( $row['email']==$email){
                    if ($row['pass'] == $password) {
                    SetCookie("auth", "true",time()+3600,'/'); //Устанавливаем куки что пользователь авторизован
                    SetCookie("userid", $row['id_user'],time()+3600,'/');
                    SetCookie("useremail", $row['email'],time()+3600,'/');
                    SetCookie("username", $row['name'],time()+3600,'/');
                    SetCookie("usersurname", $row['surname'],time()+3600,'/');
                 
                    header('Location: http://as-ps.ru/?home');  //Перенаправляем на главную страницу
                     $success_auth = ' Пользователь ' .$email . ' авторизован!';
                } else {
                    $error_auth = 'Не правильная почта или пароль!'; //Если пароли не сошлись тогда выводим ошибку
                }
                }else {
                    $error_auth = 'Не правильная почта или пароль!'; //Если пароли не сошлись тогда выводим ошибку
                }
               
        }else{
            $error_auth = 'Введите хоть что-нибудь!';
        }
	
		
    }
    if($type == 'reg') {
       		 $date = $_GET['date'];
            $email = $_GET['email']; //Получаем почту
            $password = $_GET['pass']; //Получаем пароль
            $password_re = $_GET['pass_re']; //Получаем пароль 2
            $name = $_GET['name']; //Получаем имя
            $surname = $_GET['surname']; //Получаем фамилию
        if($email != '' and $password != '' ){
            if($password == $password_re) {
                $insert = $mysqli->query("INSERT INTO `users` (`id_user`, `email`, `pass`, `name`,`surname`,`date`,`is_admin`) VALUES (NULL, '".$email."', '".$password."', '".$name."', '".$surname."','".$date."','0')");
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
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        header('Location: /search.php?search='.$search);  
    }
?>
<!-- content start -->
	<div class="wrap">

		<div class="wrap-reg">
			<form method="GET" class="reg">
					
				<?php
                    if($error_auth != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_auth.'</p>'; //Выводим ошибку
                    }else if($success_auth != null) { //Проверяем есть ли у нас автотизация
                        echo '<p>'.$success_auth.'</p>'; //Выводим сообщение
                    }else{
                    	 echo '<h3>Авторизация</h3>';
                    }
                    	
                   
                    
                    ?>

			
				<input type="hidden" name="type" value="auth">
				<input type="email" name="email" placeholder="Введите email">
				<input type="password" name="pass" placeholder="Введите пароль">
				
				<input type="submit" value="Авторизироваться" class="but-auth">
			</form>
			<form method="GET" class="reg">
				
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
				<input type="submit" value="Зарегистрироваться" class="but-reg">
			</form>
		</div>
		<!-- end wrap -->
	</div>
		
				
		
