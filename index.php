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
		$a = 5;
		$b = 2;
		if ($a >= 0 && $b >= 0) 
			echo $a - $b;
		elseif ($a < 0 && $b < 0) 
			echo $a*$b;
		else echo $a + $b;
	?>
	<h4>2.<br></h4>
	<?php
		$a = 10;
		switch ($a){
			case 0:
				echo '0 ';
			case 1:
				echo '1 ';
			case 2:
				echo '2 ';
			case 3:
				echo '3 ';
			case 4:
				echo '4 ';
			case 5:
				echo '5 ';
			case 6:
				echo '6 ';
			case 7:
				echo '7 ';
			case 8:
				echo '8 ';
			case 9:
				echo '9 ';
			case 10:
				echo '10 ';
			case 11:
				echo '11 ';
			case 12:
				echo '12 ';
			case 13:
				echo '13 ';
			case 14:
				echo '14 ';
			case 15:
				echo '15 ';
		}
	?>
	<h4>3.<br></h4>
	<?php 
		function sum($a,$b){
			return $a + $b;
		}
		function raz($a,$b){
			return $a - $b;
		}
		function mult($a,$b){
			return $a * $b;
		}
		function del($a,$b){
			return $a / $b;
		}
		echo del(3,2);
	?>
	<h4>4.<br></h4>
	<?php 
		function mathOperation($arg1, $arg2, $operation){
			switch ($operation){
				case 'sum':
					echo sum($arg1,$arg2);
					break;
				case 'raz':
					echo raz($arg1,$arg2);
					break;
				case 'mult':
					echo mult($arg1,$arg2);
					break;
				case 'del':
					echo del($arg1,$arg2);
					break;
			}
		}
		mathOperation(15,4,'raz');
	?>
	<h4>6.<br></h4>
	<?php 
		function power($val, $pow){
			if ($pow == 1){
				return $val;
			} else return power($val,$pow - 1)*$val;
		}
		echo power(2,10);
	?>
	<h4>7.<br></h4>
	<?php 
		echo $hour = +date('G').' ';
		$hour_ost = $hour % 10;
		if ($hour > 4 && $hour < 21) {
			echo 'часов ';
		} elseif ($hour_ost == 1) {
			echo 'час ';
		} else echo 'часа ';
		
		echo $minute = +date('i').' ';
		$minute_ost = $minute % 10;
		if ($minute >4 && $minute < 21){
			echo 'минут ';
		} elseif ($minute_ost == 1) {
			echo 'минута ';
		} elseif ($minute_ost > 1 && $minute_ost < 5){
			echo 'минуты ';
		} else echo 'минут ';
		
	?>
	<h4>5.<br></h4>
	<?php 
		$str = file_get_contents('main.html');
		echo str_replace('{date}',date('Y'),$str);
	?>
	
	
	
</body>
</html>


    