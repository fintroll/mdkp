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
/* @var $comments app\models\Comments[] */
/* @var $comments app\models\Files[] */

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

    <div class="col-md-12">
        <p class="ticket-control-buttons btn-group btn-group-raised">
            <?php
            if(in_array(Yii::$app->user->identity->ROLE,['aho_emp', 'aho_disp', 'aho_chief'])) {
                echo Html::a('Взять в работу', ['take', 'id' => $model->ID_TICKET], ['class' => 'btn ']);
            }?>
            <?= Html::a('Заявка выполнена', ['close', 'id' => $model->ID_TICKET], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Описание заявки</h4>
            </div>
            <div class="panel-body">
                <h4><?=
                    Editable::widget(
                        [
                            'name'=>'Description',
                            'value' => $model->DESCRIPTION,
                            'asPopover' => true,
                            'header' => 'Описание заявки',
                            'ajaxSettings'=> ['url' => \yii\helpers\Url::to(['ticket/savedesc', 'id'=>$model->ID_TICKET])],
                            'inputType' => Editable::INPUT_TEXTAREA,
                            'options' => ['class'=>'form-control','id'=>'desc'],
                            'size'=>'lg',
                            'pluginEvents' => [
                                "editableSubmit"=>"function(event, val, form, jqXHR) {
                                             $('#desc-targ').text(val);
                                             }",
                            ],
                        ]
                    );
                    ?></h4>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Комментарии к заявке</h4>
            </div>
            <div class="panel-body">
                <h4><?=
                    Editable::widget(
                        [
                            'name'=>'Description',
                            'asPopover' => true,
                            'header' => 'Описание заявки',
                            'ajaxSettings'=> ['url' => \yii\helpers\Url::toRoute(['comment/create', 'id'=>$model->ID_TICKET])],
                            'inputType' => Editable::INPUT_TEXTAREA,
                            'editableValueOptions'=> ['class' => 'btn btn-primary btn-raised'],
                            'options' => ['class'=>'form-control','id'=>'comments'],
                            'size'=>'lg',
                            'pluginEvents' => [
                                "editableSubmit"=>"function(event, val, form, jqXHR) {
                                        $.pjax.reload({container:'#commentsgrid'});
                                 }",
                            ],
                        ]
                    );
                    ?>
                </h4>
                <?php \yii\widgets\Pjax::begin(['id' => 'commentsgrid']); ?>
                <div class="col-md-8">
                    <?= Yii::$app->controller->renderPartial('_comments', ['comments'=>$comments]);?>
                </div>
                <?php \yii\widgets\Pjax::end(); ?>

            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Информация о заявке</h4>
            </div>
            <div class="panel-body">
                <table class="ticket-info">
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
                                        'ajaxSettings'=> ['url' => \yii\helpers\Url::to(['ticket/saveperformer', 'id'=>$model->ID_TICKET])],
                                        'header' => 'Исполнитель',
                                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                        'data' => $performers,
                                        'options' => ['class'=>'form-control', 'id'=>'perfchange'],
                                        'editableValueOptions'=> ['class' => 'btn btn-default'],
                                        'pluginEvents' => [
                                            "editableSubmit"=>"function(event, val, form, jqXHR) {
                                            var performers = ".json_encode($performers)."
                                            $('#perfchange-targ').text(performers[val]);
                                            }",
                                        ],
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
                                    'ajaxSettings'=> ['url' => \yii\helpers\Url::to(['ticket/savestatus', 'id'=>$model->ID_TICKET])],
                                    'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                    'data' => $statuses,
                                    'options' => ['class'=>'form-control','id'=>'stchange'],
                                    'editableValueOptions'=> ['class' => 'btn btn-default'],
                                    'pluginEvents' => [
                                        "editableSubmit"=>"function(event, val, form, jqXHR) {
                                            var statuses = ".json_encode($statuses)."
                                             $('#stchange-targ').text(statuses[val]);
                                        }",
                                    ],
                                ]
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Дата создания </h4>
                        </td>
                        <td>
                            <h4><?= $model->TIME_CREATE ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Дата последнего изменения </h4>
                        </td>
                        <td>
                            <h4><?= $model->TIME_UPDATE ?></h4>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Файлы</h4>
            </div>
            <div class="panel-body">
                <?php \yii\widgets\Pjax::begin(['id' => 'filesgrid']); ?>
                <?= \kartik\file\FileInput::widget([
                    'name' => 'input-ru',
                    'language'=> 'ru',
                    'pluginOptions' => ['uploadAsync' => true,
                        'showPreview'=> false,
                        'allowedFileExtensions'=> ['doc', 'docx', 'xls','xlsx'],
                        'uploadUrl' => \yii\helpers\Url::toRoute(['file/upload','id'=>$model->ID_TICKET])
                    ],
                    'pluginEvents' => [
                        'fileuploaded'=>  "function(event, data, previewId, index) {
                            if(data.response == '1')
                            {
                                 $.pjax.reload({container:'#filesgrid'});
                            }
                            else
                            {
                                alert(data.response);
                            }
                         }",
                    ],
                ]);
                ?>
                <div>
                    <?= Yii::$app->controller->renderPartial('_files', ['files'=>$files]);?>
                </div>
                <?php \yii\widgets\Pjax::end(); ?>
            </div>
        </div>
    </div>




</div>
