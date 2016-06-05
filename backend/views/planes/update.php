<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Planes */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Planes',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Planes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="planes-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
