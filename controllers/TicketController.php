<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Comments;
use app\models\Files;
use app\models\Statuses;
use app\models\Users;
use Yii;
use app\models\Tickets;
use app\models\TicketsSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TicketController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','all','view','saveperformer', 'savestatus','savedesc','create','close'],
                'rules' => [
                    [
                        'actions' => ['index','all','view','saveperformer', 'savestatus','savedesc','create','close'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new TicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAll()
    {
        $searchModel = new TicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        $ticket = $this->findModel($id);
        $category = Categories::find()->select('NAME_CATEGORY')->where(['ID_CATEGORY' => $ticket->FID_CATEGORY])->one();
        $creator = Users::findOne(['ID_USER' => $ticket->FID_CREATOR]);
        $performers = ArrayHelper::map(Users::find()->where(['in', 'ROLE', ['aho_emp', 'aho_disp', 'aho_chief']])->all(), 'ID_USER', 'FIO');
        $statuses = ArrayHelper::map(Statuses::find()->all(), 'ID_STATUS', 'NAME_STATUS');
        $comments = Comments::find()->joinWith('creator')->where(['FID_TICKET' => $ticket->ID_TICKET])->orderBy('TIME_CREATE DESC')->all();
        $files = Files::find()->joinWith('user')->where(['FID_TICKET' => $ticket->ID_TICKET])->orderBy('UPLOAD_TIME DESC')->all();
        return $this->render('view', [
            'model' => $ticket,
            'category' => $category,
            'creator' => $creator,
            'performers' => $performers,
            'statuses' => $statuses,
            'comments' => $comments,
            'files' => $files
        ]);
    }

    public function actionSaveperformer($id)
    {
        $ticket = $this->findModel($id);
        if (isset($_POST['hasEditable'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $ticket->FID_PERFORMER = intval($_POST['Performer']);

            if ($ticket->save()) {
                //$value = Users::findOne(['ID_USER' => $ticket->FID_PERFORMER])->FIO;
                return ['output' => $ticket->FID_PERFORMER, 'message' => 'Сохранено'];
            } else {
                return ['output' => '', 'message' => ''];
            }
        }
    }


    public function actionSavestatus($id)
    {
        $ticket = $this->findModel($id);
        if (isset($_POST['hasEditable'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $ticket->FID_STATUS = intval($_POST['Status']);

            if ($ticket->save()) {
                //$value = Statuses::findOne(['ID_STATUS' => $ticket->FID_STATUS])->NAME_STATUS;
                return ['output' => $ticket->FID_STATUS, 'message' => 'Сохранено'];
            } else {
                return ['output' => '', 'message' => ''];
            }
        }
    }

    public function actionSavedesc($id)
    {
        $ticket = $this->findModel($id);
        if (isset($_POST['hasEditable'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $ticket->DESCRIPTION = $_POST['Description'];

            if ($ticket->save()) {
                return ['output' => $ticket->DESCRIPTION, 'message' => 'Сохранено'];
            } else {
                return ['output' => '', 'message' => ''];
            }
        }
    }


    public function actionCreate()
    {
        $model = new Tickets();
        $categories = ArrayHelper::map(Categories::find()->all(), 'ID_CATEGORY', 'NAME_CATEGORY');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TICKET]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => $categories
            ]);
        }
    }


    public function actionTake($id)
    {
        $model = $this->findModel($id);
        $model->FID_STATUS = 3;
        $model->FID_PERFORMER = Yii::$app->user->id;
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TICKET]);
        } else {
            return $this->redirect(['view', 'id' => $model->ID_TICKET]);
        }
    }

    public function actionClose($id)
    {
        $model = $this->findModel($id);

        $model->FID_STATUS = $model->FID_CREATOR == Yii::$app->user->id ? 0 : 1;
        $model->FID_PERFORMER = $model->FID_CREATOR;
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TICKET]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    protected function findModel($id)
    {
        if (($model = Tickets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
