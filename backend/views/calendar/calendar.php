<?php 
use common\models\Calendar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (((Yii::$app->user->identity->client) == $idCliente) || (Yii::$app->user->can('administrator'))){ 
?>
<ul class="nav nav-tabs">	
	<?php
		$CalendarModel = new Calendar();
		$i = 0;
		foreach ($Calendars as $Calendar) { 
			if ($i == 0){ ?>

				<li class="active">
		<?php }else{ ?>
					<li>	
			<?php } ?>
					<a id= <?php echo $i;?> data-toggle="tab" href= <?php echo '"#' . $CalendarModel->encodeName($Calendar['nombre']) . $i .'"'; ?> ><?php echo $Calendar['nombre']; ?></a></li>
	  	<?php $i++; } ?>
</ul>

<div class="tab-content">
	<div class="row">
		<div class="page-header">
			<div class="pull-right form-inline col-md-5">
				<div class="btn-group">
					<button class="btn btn-primary" data-calendar-nav="prev"><< </button>
					<button class="btn btn-default" data-calendar-nav="today"><?php echo Yii::t('common', 'Today'); ?></button>
					<button class="btn btn-primary" data-calendar-nav="next"> >></button>
				</div>
				<div class="btn-group">
					<button class="btn btn-warning" data-calendar-view="year"><?php echo Yii::t('common', 'Year'); ?></button>
					<button class="btn btn-warning active" data-calendar-view="month"><?php echo Yii::t('common', 'Month'); ?></button>
					<button class="btn btn-warning" data-calendar-view="week"><?php echo Yii::t('common', 'Week'); ?></button>
					<button class="btn btn-warning" data-calendar-view="day"><?php echo Yii::t('common', 'Day'); ?></button>
				</div>
			</div>
			<div class="col-md-offset-1">
				<h3></h3>
			</div>
		</div>
	</div>

	<?php
		$x = 0; 
		foreach ($Calendars as $Calendar) { 
			if ($x == 0){ 
	?>
				<div class="tab-pane fade in active" id= <?php echo '"' . $CalendarModel->encodeName($Calendar['nombre']) . $x .'"'; ?> >
	<?php 	}else{ ?>
				<div class="tab-pane fade" id=<?php echo '"' . $CalendarModel->encodeName($Calendar['nombre']) . $x .'"'; ?> >
	<?php 	}?>
	
	
		<div class="calendar" id= <?php echo $CalendarModel->encodeName($Calendar['nombre']) . $x; ?> ></div>
			

		<input type="text" class='id NoDisplay' id= <?php echo '"id'. $x .'"'?> value= <?php echo $x?> > 
		<input type="text" class='NoDisplay' id= <?php echo '"calendar-name'. $x .'"' ?> value = <?php echo '"' . $CalendarModel->encodeName($Calendar['nombre']) . $x .'"'; ?> >
		<input type="text" id= <?php echo 'language'. $x?> class="language NoDisplay" value = <?php echo Yii::$app->language; //echo $Calendar['language']; ?> >
		<input type="text" class='firstday NoDisplay' id=<?php echo '"firstday'.$x.'"';?> value = <?php 
		 	if($Calendar["firstday"] == $CalendarModel::FIRSTDAY_LANG) echo ""; else echo $Calendar["firstday"];?> >
	 	<input type="text" class='format12 NoDisplay' value = <?php echo $Calendar["format12"]; ?> >
	 	<input type="text" class='timeStart NoDisplay' value = <?php echo $Calendar["timeStart"]; ?> >
	 	<input type="text" class='timeEnd NoDisplay' value = <?php echo $Calendar["timeEnd"]; ?> >
	 	<input type="text" class='timeInterval NoDisplay' value = <?php echo $Calendar["timeInterval"]; ?> >

		<div class="clearfix"></div>
		<br><br>
		
		<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Event</h3>
					</div>
					<div class="modal-body" style="height: 400px">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $x++; } ?>
</div>

<?php
} else{
echo Yii::t('common', 'Access denied.');
}
?>