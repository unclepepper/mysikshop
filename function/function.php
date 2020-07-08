<?php
function req($param){
	if(isset($_GET[$param])){
		$res = $_GET[$param];
		 
			return $res;

}