<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tickets */

$this->title = 'Создать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Создать';
?>
<div class="tickets-create col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
