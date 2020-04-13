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
    echo <<<HTML
<div style="font-size: 20px; height: 40vh;">
    <a href="?page=4&ver=1" style="padding: 20vh 30px; display: block">Версия 1</a>
    <a href="?page=4&ver=2" style="margin: 20px 30px">Версия 2</a>
</div>
HTML;
}