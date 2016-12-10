<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id')->textInput() ?>

    <?php echo $form->field($model, 'calendar')->textInput() ?>

    <?php echo $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fechaCreacion')->textInput() ?>

    <?php echo $form->field($model, 'customer')->textInput() ?>

    <?php echo $form->field($model, 'eventDate')->textInput() ?>

    <?php echo $form->field($model, 'start')->textInput() ?>
    
    <?php echo $form->field($model, 'end')->textInput() ?>
    
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
