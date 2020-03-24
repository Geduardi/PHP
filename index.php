<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
	<h4>1.<br></h4>
	<?php 
		$i = 0;
		while ($i++ <= 100){
			if ($i % 3 == 0){
				echo $i.' ';
			}
			
		}
	?>
	<h4>2.<br></h4>
	<?php
		$i = 0;
		echo $i++.' - ноль.<br>';
		do {
			if ($i % 2 == 0) {
				echo $i.' - четное число.<br>';
			} else {
				echo $i.' - нечетное число.<br>';
			}
		} while ($i++ < 10);
	?>
	<h4>3.<br></h4>
	<?php 
		$array = [
			'Московская область' => ["Москва","Зеленоград","Клин"],
			"Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"]
		];
		foreach ($array as $key => $value){
			echo $key.':<br>';
			for ($i = 0; $i < count($value); $i++){
			echo $value[$i].', ';
			}
			echo '<br>';
		}
	?>
	<h4>4.<br></h4>
	<?php 
	function translit($str = 'Предложение для задания.'){
		$array = [
			'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		];
		return strtr($str, $array);
	}
		
		
		
		
		echo translit();
		
	
		
	?>
	<h4>5.<br></h4>
	<?php 
	function podcherk($str = 'Предложение для задания.'){
		
		return str_replace(' ','_',$str);
	}
	
	echo podcherk();
	?>
	<h4>6.<br></h4>
	<?php 
		$str = file_get_contents('main.html');
		$menu = ['Menu_1','Menu_2',['Sub_menu_1','Sub_menu_2'],'Menu_3'];
		$menu_str = '';
		for ($i = 0; $i < count($menu); $i++){
			if (!is_array($menu[$i])){
				$menu_str .= '<li>'.$menu[$i].'</li>';
			} else {
				$menu_str .= '<ul>';
				for ($j = 0; $j < count($menu[$i]); $j++){
					$menu_str .= '<li>'.$menu[$i][$j].'</li>';
				}
				$menu_str .= '</ul>';
			}
		}
		
		
		echo str_replace('{Menu}',$menu_str,$str);
	?>
	<h4>7.<br></h4>
	<?php 
		for ($i=0; $i<10; print $i++.' '){}
	?>
	<h4>8.<br></h4>
	<?php 
		$array = [
			'Московская область' => ["Москва","Зеленоград","Клин"],
			"Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"]
		];
		foreach ($array as $key => $value){
			echo $key.':<br>';
			for ($i = 0; $i < count($value); $i++){
				if (mb_substr ($value[$i], 0, 1, 'utf-8') == 'К'){
					echo $value[$i].' ';
				}
			}
			echo '<br>';
		}
	?>
	<h4>9.<br></h4>
	<?php 
		function URL_adr($str = 'Предложение для задания.'){
			return podcherk(translit($str));
		}
		echo URL_adr();
	?>
	
	
	
</body>
</html>


    