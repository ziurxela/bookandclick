<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cPostal')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'poblacion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'telefono')->textInput() ?>

    <?php echo $form->field($model, 'nCuenta')->textInput() ?>

    <?php if (Yii::$app->user->can('administrator')){ echo $form->field($model, 'plan')->textInput(); }?>

    <?php if (Yii::$app->user->can('administrator')){ echo $form->field($model, 'fecha_alta')->textInput(); }?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
