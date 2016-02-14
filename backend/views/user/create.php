<?php
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php 
    if (!Yii::$app->User->can('administrator')){ 
    	$model->client = Yii::$app->user->identity->client; 
    }
    echo $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ]) ?>

</div>
