<?php
	$link = mysqli_connect("localhost", "root", "root", "siteusers");

	if ($link == false){
		print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
	echo '<br>';
	mysqli_set_charset($link, "utf8"); //выставил кодировку
?>