<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalendarEvent */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Calendar Event',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Calendar Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="calendar-event-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
