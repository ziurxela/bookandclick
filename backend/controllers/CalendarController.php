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
    	$msg = "ola k ase";
        //$searchModel = new ArticleSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->sort = [
        //    'defaultOrder'=>['published_at'=>SORT_DESC]
        //];
        return $this->render('index', [
            'msg' => $msg
        ]);
    }

}
