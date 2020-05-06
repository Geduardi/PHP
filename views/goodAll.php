<?php
/**
 * @var \App\models\Good[] $goods
 */

?>

<?php foreach ($goods as $good):?>
    <h1><a href="?c=good&a=one&id=<?=$good->id?>">
            <?=$good->name?>
        </a></h1>
    <p><?=$good->price?></p>
<?php endforeach; ?>
