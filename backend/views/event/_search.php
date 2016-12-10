<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EventSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'calendar') ?>

    <?php echo $form->field($model, 'titulo') ?>

    <?php echo $form->field($model, 'descripcion') ?>

    <?php echo $form->field($model, 'fechaCreacion') ?>

    <?php echo $form->field($model, 'customer') ?>
    
    <?php echo $form->field($model, 'eventDate') ?>
    
    <?php echo $form->field($model, 'start') ?>
    
    <?php echo $form->field($model, 'end') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
