<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View  
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <?php if (Yii::$app->user->can('administrator')){ 
                    echo $form->field($model, 'client'); 
                } else{
                   // echo $form->field($model, 'client')->label(User::getClient(Yii::$app->user->identity->id))->textInput(['disabled' => true]);    
                }?>
        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'password')->passwordInput() ?>
        <?php echo $form->field($model, 'status')->label(Yii::t('backend', 'Active'))->checkbox() ?>
        <?php 
        if (Yii::$app->user->can('administrator')){
            echo $form->field($model, 'roles')->checkboxList($roles); 
        }
        ?>
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
