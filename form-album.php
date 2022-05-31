<?php
    session_start();
    $login=$_SESSION['login'];
    if (!empty($_REQUEST['name']) and !empty($_REQUEST['description']) and !empty($_REQUEST['musician']) and !empty($_REQUEST['image'])) {
        if($_SESSION['auth']==true){
            include "config.php";
            $name=$_REQUEST['name'];
            $description=$_REQUEST['description'];
            $musician=$_REQUEST['musician'];
            $image=$_REQUEST['image'];
            $checkAlbum = mysqli_query($link, "SELECT * FROM albums WHERE name = '$name' AND musician = '$musician'");//проверка наличия
			$album =mysqli_fetch_object($checkAlbum);
			if(empty($album)){
				$addUser = mysqli_query($link, "INSERT INTO albums SET name = '$name', musician = '$musician', description = '$description', image='$image'"); // запись нового пользователя
				if($addUser == true) {
                    $filename=__DIR__.'/Reestr.txt';
					$fh=fopen($filename, 'a+');
					$text="User $login at ".date("G:i:s T")." was create new album $name \n";
					fwrite($fh, $text);
					fclose($fh);
                    echo "Успешно";
                    echo '<br><a href="middle.php">Балдееееееееж  d=====(￣▽￣*)b</a>';
                }
                else {
                    echo "Ошибка запроса";
                }
					
            }
            else{
                echo "Такой альбом уже есть в плейлисте ←_←";
                echo '<br><a href="middle.php">Здорово, пойду гляну </a>';
                exit();
            }
        }
        else {
            echo "Извини, ты не авторизованный пользователь (´。＿。｀)";
            echo '<br><a href="middle.php">Жаль, пойду авторизуюсь</a>';
            exit();
        }
    }
?>