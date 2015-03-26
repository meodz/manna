<?php

namespace backend\widgets;

class SideBar extends \yii\bootstrap\Widget{
    public function run()
    {
        return $this->render('SideBarView');
    }
}
