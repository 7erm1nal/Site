<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="style.css">
    <div class = "tabs">
        <div class = "tab">
            <input type="radio" id="tab1" name="tab-group" checked>
            <label for="tab1" class="tab-title">Пластинки</label> 
            <section class="tab-content">
                <?php
	include "config.php";
	$album=[];
	$n=mysqli_num_rows(mysqli_query($link, "SELECT id_album FROM albums")); //
	$temp = mysqli_query($link, 'SELECT * FROM albums');
	while ($result = mysqli_fetch_array($temp)) {
		$album[]=[$result[0],$result[1], $result[4], $result[2], $result[3]];
	}
	
	//вывод в виде таблицы с сохранением картинок
	echo '<table cellpadding="5" cellspacing="0" border="1">';
	for($i=0;$i<count($album);$i++) {
		for($j=0;$j<count($album[$i]); $j++) {
			if($j==1) echo "<td><img src=\"".$album[$i][$j]."\" height=150px width=150px></td>";
			else echo "<td>".$album[$i][$j]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?>
            </section>  
       </div> 
       <div class="tab">
        <input type="radio" id="tab2" name="tab-group">
        <label for="tab2" class="tab-title">Редактор</label> 
        <section class="tab-content">
        <h1>Добавь свой альбом</h1>
        <form action="form-album.php" method="post" >
            <input name="name" type="text" placeholder="Название" required><br>
            <input name="musician" type="text" placeholder="Исполнитель" required><br>
            <input name="description" type="text" placeholder="Описание" required><br>
            <input name="image" type="text" placeholder="URL Картинки" required><br>
            <input type="submit" value="Добавить">
         </form>
         <br>
         <br>
         <h1>Удалить альбомa из плейлиста</h1>
         <form action="delete-album.php" method="post">
             <input name="name" type="text" placeholder="Название" required><br>
             <input name="musician" type="text" placeholder="Исполнитель" required><br>
             <input type="submit" value="Удалить">
        </section>
       </div>
    </div>
</body>
</html>