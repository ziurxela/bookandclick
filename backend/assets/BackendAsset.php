<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css',
        'css/mobiscroll.custom-2.6.2.min.css'
    ];
    public $js = [
        'js/app.js',
        'js/mobiscroll.android-2.6.2.js',
        'js/mobiscroll.android-ics-2.6.2.js',
        'js/mobiscroll.core-2.6.2.js',
        'js/mobiscroll.core-2.6.2-es.js',
        'js/mobiscroll.datetime-2.6.2.js',
        'js/mobiscroll.ios-2.6.2.js',
        'js/mobiscroll.jqm-2.6.2.js',
        'js/mobiscroll.list-2.6.2.js',
        'js/mobiscroll.select-2.6.2.js',
        'js/mobiscroll.wp-2.6.2.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\AdminLte',
        'common\assets\Html5shiv',
        'common\assets\Calendar'
    ];
}
