<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Calendar */
	$this->title = Yii::t('backend', 'Update Calendar: ', [
	    'modelClass' => 'Calendar',
	]) . ' ' . $model->id;
	$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Calendar'), 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="calendar-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
