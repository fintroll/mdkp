<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_TICKET') ?>

    <?= $form->field($model, 'SUBJECT') ?>

    <?= $form->field($model, 'DESCRIPTION') ?>

    <?= $form->field($model, 'FID_CATEGORY') ?>

    <?= $form->field($model, 'FID_CREATOR') ?>

    <?php // echo $form->field($model, 'FID_PERFORMER') ?>

    <?php // echo $form->field($model, 'FID_STATUS') ?>

    <?php // echo $form->field($model, 'TIME_CREATE') ?>

    <?php // echo $form->field($model, 'TIME_UPDATE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
