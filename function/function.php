<?php

function row($param){
		$mysqli = new mysqli('localhost', 'root', '', 'rock_shop');
		 $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '".$param."'"); 
            $row = $result->fetch_assoc();
            return $row;
}

function urle(){
	if(isset($_SERVER['REQUEST_URI'])){
		$param = $_SERVER['REQUEST_URI'];
		$param = preg_replace('"/\?"', '', $param);
		$param = preg_replace('"&[A-z]*"', '', $param);
		$param = preg_replace('"="', '', $param);
		
		
	}
	return $param;
}
