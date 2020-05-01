<?php
/**
 * @var \App\models\User[] $users
 */

?>

<?php foreach ($users as $user):?>
    <h1><a href="?c=user&a=one&id=<?=$user->id?>">
            <?=$user->fio?>
        </a></h1>
    <p><?=$user->login?></p>

<?php endforeach; ?>
