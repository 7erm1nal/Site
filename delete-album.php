<?php
    session_start();
    $login=$_SESSION['login'];
    if (!empty($_REQUEST['name']) and !empty($_REQUEST['musician'])) {
        if($_SESSION['auth']==true){
            include "config.php";
            $name=$_REQUEST['name'];
            $musician=$_REQUEST['musician'];
            $checkAlbum = mysqli_query($link, "SELECT * FROM albums WHERE name = '$name' AND musician = '$musician'");//проверка наличия
			$album =mysqli_fetch_object($checkAlbum);
			if(!empty($album)){
				$addUser = mysqli_query($link, "DELETE FROM albums WHERE name = '$name' AND musician = '$musician'"); //  Удаление альбома
				if($addUser == true) {
                    $filename=__DIR__.'/Reestr.txt';
					$fh=fopen($filename, 'a+');
					$text="User $login at ".date("G:i:s T")." was delete album $name \n";
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
                echo "Такого альбома нет в плейлисте";
                echo '<br><a href="middle.php">ОК</a>';
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