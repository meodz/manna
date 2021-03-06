<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tạo banner mới</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nhập thông tin banner muốn tạo</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin();
                            ?>
                            <?= $form->field($model, 'name') ?>
                            <?= $form->field($model, 'image')->widget(\iutbay\yii2kcfinder\KCFinderInputWidget::className()) ?>
                            <?= $form->field($model, 'url') ?>
                            <?= $form->field($model, 'place')->radioList(['1' => 'Giữa trang chủ', '2' => 'Bên phải trang chủ', '3' => 'Dưới cùng trang chủ']) ?>
                            <?= $form->field($model, 'position') ?>
                            <?= $form->field($model, 'isActive')->checkbox() ?>
                            <?= Html::submitButton('Thêm banner mới', ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Quay lại danh sách', Url::to(['index']), ['class' => 'btn btn-default']) ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>