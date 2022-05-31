<?php
	if (!empty($_REQUEST['pass']) and !empty($_REQUEST['login'])) {
		$login=$_REQUEST['login'];
		$password=$_REQUEST['pass'];
		
		include "config.php";
		$checkUser = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");//проверка наличия
		$user =mysqli_fetch_object($checkUser);
		if(!empty($user)) {
			//Запись в реестр
			$filename=__DIR__.'/Reestr.txt';
			$fh=fopen($filename, 'a+');
			$text="User $login at ".date("G:i:s T")." was in \n";
			fwrite($fh, $text);
			fclose($fh);

			session_start();
			$_SESSION['auth']=true;
			$_SESSION['login']=$login;
			
			header ('Location: authorisedHeader.php');  // перенаправление
   				exit();
		}
		else {
			echo "Неверный логин или пароль";
			$_SESSION['auth']=false;
			sleep(5);
			header ('Location: header.php');  // перенаправление назад
   			exit();
		}
	}
?>