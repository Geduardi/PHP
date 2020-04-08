<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    if (!$user) {
        $user = 'Аноним';
    }
    $text = $_POST['text'];

    $sql = "INSERT INTO `review`(`user_name`, `text`, `item_id`) VALUES ('$user', '$text', '$id')";

    mysqli_query($link, $sql) or die(mysqli_error($link));

    header('Location: ?page=3&id=' . $id);
    exit;
}

$sql = "SELECT id,`user_name`, `text` FROM `review` WHERE item_id =" . $id . " ORDER BY `id` DESC";
$result = mysqli_query($link,$sql);

$page_html='<div class="reviews">';
while ($row = mysqli_fetch_assoc($result)){
    $page_html .= <<<php
    <div class="reviews__box">
        <h3>{$row['user_name']}</h3>
        <p>{$row['text']}</p>  
    </div>
php;
}

$page_html .= '</div><div class="review">';
$page_html .= <<<php
    <form method="post" class="form__review">
        <input type="text" name="user" placeholder="Ваше имя" class="form__review__user">
        <textarea  name="text" placeholder="Ваш отзыв" minlength="1" class="form__review__text"></textarea>
        <input type="submit" value="Оставить отзыв">
    </form>
php;



$page_html .= "</div>";

return $page_html;