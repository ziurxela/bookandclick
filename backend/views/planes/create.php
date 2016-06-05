<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Planes */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Planes',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Planes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planes-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
