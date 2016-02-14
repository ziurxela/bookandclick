<?php
	namespace common\assets;
	use yii\web\AssetBundle;

	class Calendar extends AssetBundle { 
	    public $sourcePath = '@bower/calendar'; 
	   
	    public $css = [ 
	    	'components/bootstrap3/css/bootstrap.min.css',
	    	//'components/bootstrap3/css/bootstrap-theme.min.css', 
	    	'css/calendar.css',
	    ]; 
	    public $js = [  
	    	'components/underscore/underscore-min.js',
	    	'components/jstimezonedetect/jstz.min.js',
	    	'js/language/es-ES.js',
	    	'js/calendar.js',  	
	    ];
	}