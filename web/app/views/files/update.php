<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Files */

$this->title = 'Update Files: ' . ' ' . $model->ID_FILE;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_FILE, 'url' => ['view', 'id' => $model->ID_FILE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="files-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
