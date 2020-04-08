<?php
function sum($a,$b){
    return 'Ответ: ' . ((int)$a + $b);
}
function razn($a,$b){
    return "Ответ: " . ((int)$a - $b);
}
function del($a,$b){
    if (!$b) {
        return "На ноль делить нельзя";
    }
    return "Ответ: " . ((int)$a / $b);
}
function mult($a,$b){
    return "Ответ: " . ((int)$a * $b);
}

if (!empty($_GET['ver'])){
    include 'component/calculator_ver.php';
} else {
    echo <<<php
    <a href="?page=4&ver=1">Версия 1</a>
    <a href="?page=4&ver=2">Версия 2</a>
php;
}