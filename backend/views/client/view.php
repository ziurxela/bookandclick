<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
if (((Yii::$app->user->identity->client) === $model->id) || (Yii::$app->user->can('administrator'))){
if (Yii::$app->user->can('administrator')){ 
    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Client'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="client-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
            if (Yii::$app->user->can('administrator')){ 
                echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                    ],
                ]); 
            }
        ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'direccion',
            'cPostal',
            'poblacion',
            'provincia',
            'pais',
            'telefono',
            'nCuenta',
            'plan',
            'fecha_alta',
        ],
    ]) ?>

</div>
<?php  } ?>
