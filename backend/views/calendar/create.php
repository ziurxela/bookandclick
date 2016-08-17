<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Calendar */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Calendar',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Calendar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-create">

    <?php 
    echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
