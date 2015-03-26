<?php

use yii\helpers\Html;
use backend\assets\CommonAsset;
use backend\assets\UserAsset;
use backend\widgets\SideBar;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

$commonBundle = CommonAsset::register($this);
$userBundle = UserAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hangnhap administrator's</title>
        <?php $this->head() ?>
        <script>
            framework({
                baseUrl: '<?= $this->context->baseUrl ?>',
                assetsUrl: '<?= $this->context->baseUrl . 'assets' ?>',
                uploadUrl: '<?= $this->context->baseUrl . 'upload/' ?>',
                templatePath: '<?= 'template/' ?>',
                servicePath: '<?= $this->context->baseUrl ?>',
            });
        </script>    
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="wrapper">
            <!-- <?= Yii::$app->user->isGuest ? '' : SideBar::widget() ?> -->
            <?= $content ?>
        </div>
        <script><?= Yii::$app->controller->clientScript ?></script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
