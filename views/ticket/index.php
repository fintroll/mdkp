<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'ID_TICKET',
            'SUBJECT',
            'DESCRIPTION:ntext',
            [
                'attribute' => 'category.NAME_CATEGORY',
                'value' => 'category.NAME_CATEGORY',
                'filter' => Html::activeDropDownList($searchModel, 'category.NAME_CATEGORY', \yii\helpers\ArrayHelper::map(\app\models\Categories::find()->asArray()->all(), 'NAME_CATEGORY', 'NAME_CATEGORY'),['class'=>'form-control', 'prompt' => 'Все']),
            ],
            'performer.FIO',
            [
                'attribute' => 'status.NAME_STATUS',
                'value' => 'status.NAME_STATUS',
                'filter' => Html::activeDropDownList($searchModel, 'status.NAME_STATUS', \yii\helpers\ArrayHelper::map(\app\models\Statuses::find()->asArray()->all(), 'NAME_STATUS', 'NAME_STATUS'),['class'=>'form-control', 'prompt' => 'Все']),
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('Просмотр', $url, ['class'=> 'btn btn-primary']);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
