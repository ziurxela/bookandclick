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
<div class="panel panel-default">
	<div class="panel-body">
		<input id="url" type="hidden" value= <?php echo Yii::$app->request->baseUrl .'/event/sample' ?> >
		<input id="ValidacionHora" type="hidden" value="<?php echo yii::t('backend','Start time must be less than the end time'); ?>">
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
		    				echo '<button class="btn btn-default btnAddRecess" type="button" onclick="AddNewRecess(' . $idCalendar . ');"><i class="fa fa-plus" aria-hidden="true"></i></button>';
		    			?>
		    		</td>
		    	</tr>
		    	<?php 
		    	foreach ($dataProvider as $dp) { 
		    		echo    '<tr id="DataRecess' . $dp['id'] . '">'.
		    					'<input id="id' . $dp['id'] . '" type="hidden" value="' . $dp['id'] . '" >'.
		    					'<td id="titulo' . $dp['id'] . '">' . $dp['titulo'] . '</td>'.
		    					'<td id="start' . $dp['id'] . '">' . $dp['start']. '</td>'.
		    					'<td id="end' . $dp['id'] . '">' . $dp['end'] . '</td>'.
		    					'<td><button class="btn btn-default btnDeleteRecess" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button></td>'.
		    				'</tr>'; 
				} ?>
		    </tbody>
		</table>
  	</div>
</div>

