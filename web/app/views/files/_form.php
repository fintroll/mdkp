<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Files */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="files-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FILENAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FILEPATH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EXTENSION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPLOAD_TIME')->textInput() ?>

    <?= $form->field($model, 'FID_TICKET')->textInput() ?>

    <?= $form->field($model, 'FID_USER')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
