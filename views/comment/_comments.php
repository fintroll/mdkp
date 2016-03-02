<?php

/* @var $comments app\models\Comments[] */
?>


<?php foreach ($comments as $comment) { ?>
<div class="list-group">
    <div class="list-group-item">
        <div class="row-content">
            <div class="least-content"><?= $comment->TIME_CREATE ?></div>
            <h4 class="list-group-item-heading"><?= $comment->creator->FIO?></h4>

            <p class="list-group-item-text"><?= $comment->TEXT ?></p>
        </div>
    </div>
    <div class="list-group-separator"></div>
</div>
<?php } ?>
