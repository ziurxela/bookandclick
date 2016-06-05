<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
if (((Yii::$app->user->identity->client) === $model->id) || (Yii::$app->user->can('administrator'))){
$this->title = Yii::t('backend', 'Update Client: ', [
    'modelClass' => 'Client',
]) . ' ' . $model->id;
if (Yii::$app->user->can('administrator')){
	$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
}
?>
<div class="client-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php  } ?>
