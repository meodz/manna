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
class UserAsset extends AppAsset{
    public $js = [
        'js/jquery-1.11.0.js',
        'js/jqueryui.js',
        'js/common.js',
        'js/framework.js',
    ];
    public function init(){
        $this->jsOptions['position'] = View::POS_HEAD;
        parent::init();
    }
}
