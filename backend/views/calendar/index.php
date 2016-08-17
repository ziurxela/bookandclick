<?php
use common\models\Calendar;
use common\models\Client;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>	
	<?php 
	if (Yii::$app->user->can('administrator')){
		$ClientModel = new Client();
		$listClients = $ClientModel->getClientsId();
		?>
		<div class="col-md-4 col-md-offset-1">
			<div class="input-group">                                            
			    <input type="TextBox" ID="datebox" Class="form-control"></input>
			    <div class="input-group-btn">
			        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
			        	<?php echo Yii::t('common', 'Client'); ?>
			            <span class="caret"></span>
			        </button>
			        <ul id="Clientlist" class="dropdown-menu pull-right">
			        	<?php foreach ($listClients as $Client) { 
			        			$NombreCliente = $ClientModel->getClientsNames($Client['id']);
			        			echo '<li><a href="/calendar/calendar?id='. $Client['id'] . '">'. $NombreCliente[0]['nombre'] . '</a></li>';
			        		 } ?>
			        </ul>
			    </div>
			</div>
		</div>
		<?php
	} else {
		$url = "/calendar/calendar?id=". Yii::$app->user->identity->client;
		return Yii::$app->getResponse()->redirect($url)->send();
	}
	?>
