<?php

/* @var $files app\models\Files[] */
?>


<?php foreach ($files as $file) { ?>
    <div class="list-group" id="files-list-group">
        <div class="list-group-item">
            <div class="row-content">

                <h4 class="list-group-item-heading"><?= \yii\bootstrap\Html::a(
                        $file->FILENAME . '.' . $file->EXTENSION,
                        \yii\helpers\Url::to('/web'.$file->FILEPATH . $file->FILENAME . '.' . $file->EXTENSION, true),
                        ['target'=>'_blank', 'class'=>'no-pjax']
                    ) ?></h4>

                <p class="list-group-item-text"><?= $file->user->FIO ?></p>
                <div class="least-content"><?= $file->UPLOAD_TIME ?></div>
            </div>
        </div>
        <div class="list-group-separator"></div>
    </div>
<?php } ?>
