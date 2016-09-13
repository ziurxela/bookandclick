<?php

use common\models\Calendar;
use common\models\Planes;
use yii\helpers\Html;

$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = $this->title;

$PlanesModel = new Planes();
$NumCalendar = $PlanesModel->getNumCalendarsByClient(Yii::$app->user->identity->client);
$CalendarModel = new Calendar();
$NumCalendarUsed = $CalendarModel->getNumCalendars(Yii::$app->user->identity->client);
$Calendars = $CalendarModel->getCalendars(Yii::$app->user->identity->client);
?>
<?php  //Boton de creación de calendarios según plan si es 0 los calendarios son infinitos
	if ($NumCalendar > $NumCalendarUsed || $NumCalendar == 0) { 
?>
<div class="col-md-3 col-md-offset-9">
    <p>
        <?php echo Html::a(Yii::t('backend', 'Create Calendar', [
    		'modelClass' => 'Calendar',]), ['create'], ['class' => 'btn btn-success']) 
    	?>
    </p>
</div>
<?php } ?>

<ul class="nav nav-tabs">	
	<?php
		$i = 0;
		foreach ($Calendars as $Calendar) { 
			if ($i == 0){ ?>

				<li class="active">
		<?php }else{ ?>
					<li>	
			<?php } ?>
					<a data-toggle="tab" href= <?php echo '"#' . $CalendarModel->encodeName($Calendar['nombre']) . $i .'"'; ?> ><?php echo $Calendar['nombre']; ?></a></li>
	  	<?php $i++; } ?>
</ul>
<div class="tab-content">
	<?php
		$x = 0; 
		foreach ($Calendars as $Calendar) { 
			if ($x == 0){ 
	?>
				<div class="tab-pane fade in active" id= <?php echo '"' . $CalendarModel->encodeName($Calendar['nombre']) . $x .'"'; ?> >
	<?php 	}else{ ?>
				<div class="tab-pane fade" id=<?php echo '"' . $CalendarModel->encodeName($Calendar['nombre']) . $x .'"'; ?> >
	<?php 	}
	?>
	<?php
		$idCalendar = $Calendar['id'];  
		$model = $CalendarModel->findModel($idCalendar);
	?>	
	<div class="calendar-settings">
	    <?php echo $this->render('_settings', [
	        'model' => $model,
	    ]) ?>
	</div>

	</div>
	<?php $x++; } ?>
</div>	