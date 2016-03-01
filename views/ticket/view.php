<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\popover\PopoverX;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $category app\models\Categories */
/* @var $creator app\models\Users */
/* @var $performers array */
/* @var $statuses array */

$this->title = $model->SUBJECT;
//$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tickets-view">

    <div class="ticket-header">
        <i class="material-icons icon"><?= $category->getImage($model->FID_CATEGORY) ?></i>

        <div class="text-header">
            <h4><?= Html::a($category->NAME_CATEGORY, ['bycategory', 'id' => $model->FID_CATEGORY]) ?>
                / <?= $model->ID_TICKET ?></h4>

            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>


    <p class="ticket-control-buttons btn-group btn-group-raised">
        <?= Html::a('Комментировать', ['update', 'id' => $model->ID_TICKET], ['class' => 'btn ']) ?>
        <?= Html::a('Взять в работу', ['delete', 'id' => $model->ID_TICKET], ['class' => 'btn ']) ?>
        <?= Html::a('Заявка выполнена', ['delete', 'id' => $model->ID_TICKET], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Информация о заявке</h4>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td>
                            <h4>Заявитель</h4>
                        </td>
                        <td>
                            <?php
                            $content = "<table>
                                            <tr>
                                                <td>
                                                   {$creator->FIO}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>"
                                                   .Html::mailto($creator->EMAIL, $creator->EMAIL)."
                                                </td>
                                            </tr>
                                        </table>";
                            echo PopoverX::widget([
                                'header' => 'Подробнее о заявителе',
                                'placement' => PopoverX::ALIGN_TOP,
                                'content' => $content,
                                'toggleButton' => ['label' => $creator->FIO, 'class' => 'btn btn-link'],
                            ]);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Исполнитель</h4>
                        </td>
                        <td>
                            <?=
                                Editable::widget(
                                    [
                                        'name'=>'Performer',
                                        'value' => $performers[$model->FID_PERFORMER],
                                        'asPopover' => false,
                                        'header' => 'Исполнитель',
                                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                        'data' => $performers,
                                        'options' => ['class'=>'form-control', /*'prompt'=>'Select status...'*/],
                                        'editableValueOptions'=> ['class' => 'btn btn-link'],
                                    ]
                                );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Статус</h4>
                        </td>
                        <td>
                            <?=
                            Editable::widget(
                                [
                                    'name'=>'Status',
                                    'value' => $statuses[$model->FID_STATUS],
                                    'asPopover' => false,
                                    'header' => 'Статус',
                                    'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                    'data' => $statuses,
                                    'options' => ['class'=>'form-control', /*'prompt'=>'Select status...'*/],
                                    'editableValueOptions'=> ['class' => 'btn btn-link'],
                                ]
                            );
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Даты</h4>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td>
                            <h4>Дата создания</h4>
                        </td>
                        <td>
                            <h4><?= $model->TIME_CREATE ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Дата последнего изменения</h4>
                        </td>
                        <td>
                            <h4><?= $model->TIME_UPDATE ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Затраченное время</h4>
                        </td>
                        <td>
                            <h4>
                                <?php
                                    $date1=date_create($model->TIME_CREATE);
                                    $date2=date_create($model->getCurrentTimestamp());
                                    $diff=date_diff($date1,$date2);
                                    echo $diff->format('%d Day %h Hours %i Minute');
                                ?>
                            </h4>
                        </td>
                    </tr>
                </table>
            </div>
    </div>


</div>
