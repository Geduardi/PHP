<?php

use App\services\DB;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoloader.php";
spl_autoload_register([new App\services\Autoloader(), 'loadClass']);


$user = new User();
//$users = $user ->getAll();
//var_dump($users);
//$users = $user ->getOne(2);
//var_dump($users);

$user->id = 1;
$user->login = 'User_2';
$user->password = 111;
$user->fio = 'NaN';

$user->save();


//$good = new Good($bd);
//echo $user->getAll();
//echo '<br>';
//echo $user->getOne(12);
