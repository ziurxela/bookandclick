<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CalendarEvent */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Calendar Event',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Calendar Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-event-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
