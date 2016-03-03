<?php

namespace app\controllers;

use Yii;
use app\models\Files;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FileController implements the CRUD actions for Files model.
 */
class FileController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionUpload($id)
    {
        $fileInstance = UploadedFile::getInstanceByName('input-ru');
        if (!$fileInstance->hasError){
            $file = new Files();
            $file->FID_USER = Yii::$app->user->id;
            $file->FILENAME = $fileInstance->baseName;
            $file->EXTENSION = $fileInstance->extension;
            $file->FILEPATH = '/uploads/';
            $file->FID_TICKET = $id;
            $fsName = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')? mb_convert_encoding($fileInstance->name, "windows-1251" , "utf-8") : $fileInstance->name;
            $fileInstance->saveAs(Yii::$app->basePath.'\web\uploads\\'.$fsName);
            if ($file->save()){
                return true;
            } else {
                return $file->getErrors();
            }
        } else {
            return $fileInstance->error;
        }

    }

    /**
     * Deletes an existing Files model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Files model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Files::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
