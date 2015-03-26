<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\View;
use frontend\assets\AppAsset;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CommonAsset extends AppAsset {

    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/styles.css',
        'css/responsive.css',
        'css/sb-admin-2.css',
        'css/popup-static.css',
    ];
    public $js = [
        'js/ejs.js',
        'js/jquery.min.js',
        'js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init() {
        $this->cssOptions['position'] = View::POS_BEGIN;
        $this->jsOptions['position'] = View::POS_BEGIN;
        parent::init();
    }

}
