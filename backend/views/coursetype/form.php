<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
?>
<script type="text/javascript">
    CKEDITOR_BASEPATH='path/to/ckeditor/';
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Course</h1>
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
                <div class="panel-heading">Course information</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin();
                            ?>
                            <?= $form->field($model, 'name') ?>
                            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                                'options' => ['rows' => 6],
                                'preset' => 'full'
                                ]) ?>
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