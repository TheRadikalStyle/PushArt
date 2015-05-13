<?php
error_reporting(E_ALL & ~E_NOTICE);  
function consulta ($query){
		$mysqli = mysqli_connect('localhost', 'root','root', 'maintekintegra');	
		
		if (mysqli_connect_errno()) {
			printf("Error al conectar: %s\n", mysqli_connect_error());
			exit();
		}
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
    	$consulta = mysqli_query($mysqli,$query);	
		mysqli_close($mysqli);
		return $consulta;
}


function redirecciona($url){
echo "<script> location.href= '".$url."'; </script>";
}

function session(){
    session_cache_limiter($cache_limiter);
	session_start();
	if(@$_SESSION['id'] == ""){
		redirecciona("index.php?err=0_2");
	}
}
function sessionIniciada(){
    session_cache_limiter($cache_limiter);
	session_start();
	if(!(@$_SESSION['id'] == "")){
		redirecciona("Home.html");
	}
}
?>