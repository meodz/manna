<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;
use yii\web\View;
use backend\assets\AppAsset;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CommonAsset extends AppAsset{
    public $css = [
        'css/bootstrap.min.css',
        'css/plugins/metisMenu/metisMenu.min.css',
        'css/sb-admin-2.css',
        'css/popup-static.css',
        'font-awesome-4.1.0/css/font-awesome.min.css',
        'css/content.css',
        
    ];
    public $js = [
        'js/ejs.js',
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/metisMenu.min.js',
        'js/sb-admin-2.js',
        'ckeditor/ckeditor.js',
        'ckeditor/adapters/jquery.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public function init(){
        $this->cssOptions['position'] = View::POS_BEGIN;
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}
