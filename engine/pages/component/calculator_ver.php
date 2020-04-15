<?php
$page_html = <<<php
    <form class="calculator">
        <input type="hidden" name="page" value="4">
        <input type="number" name="var_1">
        {MODULE}
        <input type="number" name="var_2">
        {RESULT}
php;
if (!empty($_GET['operation'])){
    $func = $_GET['operation'];
    if ($_GET['var_1'] != '' && $_GET['var_2'] != '') {
        $page_html = "<h1>{$func($_GET['var_1'],$_GET['var_2'])}</h1>" . $page_html;
    } else {
        $page_html = "<h1>Нужно ввести два числа.</h1>" . $page_html;
    }
}

if ($_GET['ver'] == 1){
    $module_html = "
        <select name=\"operation\">
            <option value=\"sum\">+</option>
            <option value=\"razn\">-</option>
            <option value=\"del\">/</option>
            <option value=\"mult\">*</option>
        </select>        ";
    $result_html = "<input type=\"submit\" value=\"Ответ\">";
    $page_html = str_replace(['{MODULE}','{RESULT}'], [$module_html, $result_html], $page_html);
} else {
    $module_html = "
        <div class='calculator__buttons'>
            <button name=\"operation\" value=\"sum\">+</button>
            <button name=\"operation\" value=\"razn\">-</button>
            <button name=\"operation\" value=\"del\">/</button>
            <button name=\"operation\" value=\"mult\">*</button>
        </div>";
    $result_html = '';
    $page_html = str_replace(['{MODULE}','{RESULT}'], [$module_html, $result_html], $page_html);
}

$page_html .= "<input type='hidden' name='ver' value='{$_GET['ver']}'></form>";

return $page_html;