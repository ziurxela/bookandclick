<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form ActiveForm */
?>
<div class="ClientForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'direccion') ?>
        <?= $form->field($model, 'cPostal') ?>
        <?= $form->field($model, 'provincia') ?>
        <?= $form->field($model, 'fecha_alta') ?>
        <?= $form->field($model, 'telefono') ?>
        <?= $form->field($model, 'nCuenta') ?>
        <?= $form->field($model, 'plan') ?>
        <?= $form->field($model, 'poblacion') ?>
        <?= $form->field($model, 'pais') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- ClientForm -->
