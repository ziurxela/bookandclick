<?php

namespace backend\controllers;

use Yii;
use common\models\Calendar;
use backend\models\search\CalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class CalendarController extends Controller{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionSettings()
    {
        $Cal = new Calendar();
        $Calendars  = $Cal->getCalendars(Yii::$app->user->identity->client);
        foreach ($Calendars as $Calendar) {
            $id = $Calendar['id'];
            if(isset($_POST[$id])){
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['settings']);
                }
            }
        }        
        return $this->render('settings');
    }

    public function actionCalendar($id)
    {
        $Cal = new Calendar();
        $Calendars = $Cal->getCalendars($id);
        $idCliente = $id;
        return $this->render('calendar', [
            'Calendars' => $Calendars,
            'idCliente' => $idCliente,
        ]);
    }
        /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calendar();

        if (!Yii::$app->user->can('administrator')){
            $model->idCliente = Yii::$app->user->identity->client;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['settings']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Calendar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
