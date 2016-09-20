<?php
use common\models\Calendar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Calendar */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="calendar-settings">

    <?php $form = ActiveForm::begin();
        echo $form->errorSummary($model); 
    ?>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]); ?>
        </div>
        <!--div class="col-md-2 col-md-offset-2">
            <?php echo $form->field($model, 'language')->dropDownlist([
                    Calendar::LANGUAGE_ENGLISH => Yii::t('backend', 'English'),
                    Calendar::LANGUAGE_SPANISH => Yii::t('backend', 'Spanish')
                ]);
            ?>
        </div -->
    </div>
    <div class="row">
        <div class="col-md-5">
            <?php echo $form->field($model, 'firstday')->dropDownlist([
                    Calendar::FIRSTDAY_LANG => Yii::t('common','First day of week language-dependant'),
                    Calendar::FIRSTDAY_SUNDAY => Yii::t('common','First day of week is Sunday'),
                    Calendar::FIRSTDAY_MONDAY => Yii::t('common', 'First day of week is Monday')
                ]);
            ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <?php echo $form->field($model, 'format12')->dropDownlist([
                    Calendar::TRUE => Yii::t('common','12-hour'),
                    Calendar::FALSE => Yii::t('common','24-hour')
                ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'timeStart')->textInput(['maxlength' => true, 'class' => 'form-control mobiscroll calendar-time']); ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'timeEnd')->textInput(['maxlength' => true, 'class' => 'form-control mobiscroll calendar-time']); ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'timeInterval')->textInput(['maxlength' => true,  'class' => 'form-control mobiscroll calendar-interval']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-default btnAddRecess" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
            <label><?php echo Yii::t('backend', 'Recess staff'); ?></label>
        </div>
    </div>
    <div class="row addRecess">
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <div class="form-group">
                <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary', 'name' => $model->id]);?>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
