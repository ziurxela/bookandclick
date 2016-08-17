<?php 
use common\models\Calendar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (((Yii::$app->user->identity->client) == $idCliente) || (Yii::$app->user->can('administrator'))){
?>

<ul class="nav nav-tabs">	
	<?php
		$i = 0;
		foreach ($Calendars as $Calendar) { 
			if ($i == 0){ ?>

				<li class="active">
		<?php }else{ ?>
					<li>	
			<?php } ?>
					<a data-toggle="tab" href= <?php echo '"#' . str_replace(' ', '', $Calendar['nombre']) . $i .'"'; ?> ><?php echo $Calendar['nombre']; ?></a></li>
	  	<?php $i++; } ?>
</ul>

 <div class="tab-content">
 	<?php
 		$x = 0; 
 		foreach ($Calendars as $Calendar) { 
 	 		if ($x == 0){ ?>
  				<div class="tab-pane fade in active" id= <?php echo '"' . str_replace(' ', '', $Calendar['nombre']) . $x .'"'; ?> >
  			<?php }else{ ?>
  				<div class="tab-pane fade" id=<?php echo '"' . str_replace(' ', '', $Calendar['nombre']) . $x .'"'; ?> >
  			<?php }?>
      <div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< </button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next"> >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>

		<h3></h3>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="calendar"></div>
		</div>
		<!-- Con display= none -->
		<div class="setupNoDisplay col-md-3">
			<div class="row">
				<select id="first_day" class="form-control">
					<option value="" selected="selected">First day of week language-dependant</option>
					<option value="2">First day of week is Sunday</option>
					<option value="1">First day of week is Monday</option>
				</select>
				<select id="language" class="form-control">
					<option value="">Select Language (default: en-US)</option>
					<option value="es-ES">Spanish (Spain)</option>
				</select>
				<label class="checkbox">
					<input type="checkbox" value="#events-modal" id="events-in-modal"> Open events in modal window
				</label>
				<label class="checkbox">
					<input type="checkbox" id="format-12-hours"> 12 Hour format
				</label>
				<label class="checkbox">
					<input type="checkbox" id="show_wb" checked> Show week box
				</label>
				<label class="checkbox">
					<input type="checkbox" id="show_wbn" checked> Show week box number
				</label>
			</div>

			<h4>Events</h4>
			<small>This list is populated with events dynamically</small>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
		<!-- Hasta aquí el display none-->
	</div>

	<div class="clearfix"></div>
	<br><br>
	<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

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