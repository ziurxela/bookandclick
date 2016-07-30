<?php

namespace backend\controllers;

use Yii;
use common\models\Calendar;
//use backend\models\search\ArticleSearch;
//use \common\models\ArticleCategory;
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
        return $this->render('settings', [
            //'model' => $this->findModel($id),
        ]);
    }
}
