<?php
	$h1 = 'Заголовок';
	$title = 'Название страницы';
	$year = date(Y);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
	<?php echo "$h1 <br> $year год <br>"  ?>
</body>
</html>


    <?php
		$a = 5;
		$b = '05';
		var_dump($a == $b);         // Почему true?  //Сравнение с приведением типа, строка приводится к числу 5
		var_dump((int)'012345');     // Почему 12345?  //Строка явно приводится к числовому типу
		var_dump((float)123.0 === (int)123.0); // Почему false?  //Сравнение без приведения, типы разные
		var_dump((int)0 === (int)'hello, world'); // Почему true?  //Т.к.первый знак строки не число, то при явном приведении к числовому типу станет значение 0
	?>