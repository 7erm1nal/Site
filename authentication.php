<?php

//если форма авторизации отправлена
	if (!empty($_REQUEST['pass']) and !empty($_REQUEST['login']) and !empty($_REQUEST['re-pass'])) {
		if ($_REQUEST['pass']==$_REQUEST['re-pass']) { //если пароль с повтором пароля совпадают
			$login=$_REQUEST['login'];
			$password=$_REQUEST['pass'];
			
			include "config.php";
			$checkUser = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");//проверка наличия
			$user =mysqli_fetch_object($checkUser);
			if(empty($user)){
				$addUser = mysqli_query($link, "INSERT INTO users SET login = '$login', password = '$password'"); // запись нового пользователя
				if($addUser == true) {
					//Запись в реестр о новом пользователе
					$filename=__DIR__.'/Reestr.txt';
					$fh=fopen($filename, 'a+');
					$text="New User $login at ".date("G:i:s T")." was log in with password $password \n";
					fwrite($fh, $text);
					fclose($fh);

					session_start();
					$_SESSION['auth']=true;
					$_SESSION['login']=$login;

					header ('Location: authorisedHeader.php');  // перенаправление 
   					exit();
				}
				else {
					echo 'Ошибка запроса';
					$_SESSION['auth']=false;
					sleep(5);
					header ('Location: header.php');  // перенаправление назад
   					exit();
				}
			}
			else {
				echo 'Пользователь существует';
				$_SESSION['auth']=false;
				sleep(5);
				header ('Location: header.php');  // перенаправление назад
   				exit();
			}
			
		}
		else echo "Пароли не совпадают";
	}
?>