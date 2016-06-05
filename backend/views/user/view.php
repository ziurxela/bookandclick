<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
if (((Yii::$app->user->identity->client) === $model->client) || (Yii::$app->user->can('administrator'))){

$this->title = $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ((Yii::$app->user->identity->id)!==($model->id)){
             echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this user?'),
                'method' => 'post',
            ],
        ]); } ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'client',
            'username',
            'auth_key',
            'password_reset_token',
            'email:email',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
            'logged_at:datetime',
        ],
    ]) ?>

</div>
<?php } ?>
