<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
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
                <div class="panel-heading">User information</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin();
                            ?>
                            <?= $form->field($model, 'username') ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <?= $form->field($model, 'realname') ?>
                            <?= $form->field($model, 'phone') ?>
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'groupId')->dropDownList($groups) ?>
                            <?= $form->field($model, 'address')->textarea() ?>
                            <?= $form->field($model, 'gender')->radioList(['1' => 'Male', '2' => 'Female']) ?>
                            <?= $form->field($model, 'status')->checkbox() ?>
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Back', Url::to(['index']), ['class' => 'btn btn-default']) ?>
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