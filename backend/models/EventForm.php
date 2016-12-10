<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form ActiveForm */
?>
<div class="EventForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'calendar') ?>
        <?= $form->field($model, 'titulo') ?>
        <?= $form->field($model, 'descripcion') ?>
        <?= $form->field($model, 'fechaCreacion') ?>
        <?= $form->field($model, 'customer') ?>
        <?= $form->field($model, 'eventDate') ?>
        <?= $form->field($model, 'start') ?>
        <?= $form->field($model, 'end') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- EventForm -->
