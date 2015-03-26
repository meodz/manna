<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Course</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $form = ActiveForm::begin(['method' => 'GET', 'action' => Url::to([Yii::$app->controller->route])]);
                            ?>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <?= Html::input('text', 'id', $id, ['placeholder' => 'Input id to search', 'class' => 'form-control'])?>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <?= Html::input('text', 'name', $name, ['placeholder' => 'Input name to search', 'class' => 'form-control'])?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Teacher</label>
                                    <?= Html::input('text', 'teacher', $teacher, ['placeholder' => 'Input teacher name to search', 'class' => 'form-control'])?>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <?= Html::dropDownList('groupId', $type, $types, ['class' => 'form-control']) ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('All', Url::to([Yii::$app->controller->route]), ['class' => 'btn btn-default']) ?>
                                    <?= Html::a('Create', Url::to(['create']), ['class' => 'btn btn-default']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <?php

        use yii\grid\GridView;

        echo GridView::widget([
            'dataProvider' => $data,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'price',
            [
                    'class' => 'yii\grid\DataColumn', // can be omitted, default
                    'header' => 'Real name',
                    'value' => function ($data) {
                        //return $data->firstName . ' ' . $data->midName . ' ' . $data->lastName; //$data['name'] for array data, e.g. using SqlDataProvider.
                        return $data->realname;
                    },
                    ],
                    'countryCode',
                    [
                    'header' => 'Edit',
                    'content' => function($data) {
                        return '<a href="' . \yii\helpers\Url::to(['edit', 'id' => $data->id]) . '"><i class="fa fa-edit"></i></a>';
                    }
                    ],
                    [
                    'header' => 'Remove',
                    'content' => function($data) {
                        return '<a href="' . \yii\helpers\Url::to(['delete', 'id' => $data->id]) . '"><i class="fa fa-trash-o"></i></a>';
                    }
                    ]
                    ],
                    ]);
                    ?>
                </div>
                <!-- /.row -->            
            </div>
            <!-- /#page-wrapper -->
            <?php
//$this->registerJsFile('@web/js/Course.js', ['depends' => ['yii\web\YiiAsset']]);
            ?>