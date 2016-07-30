<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
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
	</div>
