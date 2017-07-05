<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fonts/css/font-awesome.min.css',
        'css/animate.min.css',
        'css/custom.css',
        'css/icon.css',
        'css/select2.min.css',
        'css/jquery.fancybox.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js',
        'js/jquery-ui.min.js',
        'js/moment.min.js',
        'js/tinymce/tinymce.min.js',
        'js/select2.min.js',
        'js/custom.js',
        'js/article.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
