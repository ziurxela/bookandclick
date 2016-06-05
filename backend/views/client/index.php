<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create Client', [
    'modelClass' => 'Client',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            //'direccion',
            //'cPostal',
            'poblacion',
            'provincia',
            //'pais',
            'telefono',
            //'nCuenta',
            //'plan',
            //'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
