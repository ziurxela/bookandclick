<?php
use common\models\Calendar;
use common\models\Event;
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Calendar */
/* @var $form yii\bootstrap\ActiveForm */

$EventModel = new event();   
$dataProvider = $EventModel->getRecessByClient($idCalendar);

?>

<h4><?php echo Yii::t('backend', 'Rest intervals'); ?></h4>
<input class="idCalendar" type="hidden" value=<?php echo $idCalendar; ?> >
<div class="panel panel-default">
	<div class="panel-body">
  		<table id= <?php echo "Recess". $idCalendar; ?> class="table table-hover">
    		<thead>
      			<tr>
			        <th><?php echo Yii::t('backend', 'Interval type'); ?></th>
			        <th><?php echo Yii::t('backend', 'Start'); ?></th>
			        <th><?php echo Yii::t('backend', 'End'); ?></th>
			        <th></th>
      			</tr>
    		</thead>
		    <tbody>
		    	<tr>
		    		<td><input id=<?php echo "titulo". $idCalendar; ?> type="text" class="form-control" name="titulo"></td>
		    		<td><input id=<?php echo "start". $idCalendar; ?> type="text" class="form-control mobiscroll calendar-time" name="start"></td>
		    		<td><input id=<?php echo "end". $idCalendar; ?> type="text" class="form-control mobiscroll calendar-time" name="end"></td>
		    		<td>
		    			<?php
		    				echo Html::button('<i class="fa fa-plus" aria-hidden="true"></i>', [ 'class' => 'btn btn-default btnAddRecess', 'onclick' => $EventModel->addRecess($idCalendar) ])
		    			?>
		    		</td>
		    	</tr>
		    	<?php 
		    	foreach ($dataProvider as $dp) { 
		    		echo    '<tr>'.
		    					'<td>' . $dp['titulo'] . '</td>'.
		    					'<td>' . $dp['start']. '</td>'.
		    					'<td>' . $dp['end'] . '</td>'.
		    					'<td><button class="btn btn-default btnDeleteRecess" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button></td>'.
		    				'</tr>'; 
				} ?>
		    </tbody>
		</table>
  	</div>
</div>

