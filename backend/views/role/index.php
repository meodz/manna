<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role</h1>
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Role filter
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <a type="button" href="<?= \yii\helpers\Url::to('role/create') ?>" class="btn btn-default">Create</a>
                            </form>
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
        use yii\data\ActiveDataProvider;
        use common\models\Role;

$dataProvider = new ActiveDataProvider([
            'query' => Role::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'action',
                'description',
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
//$this->registerJsFile('@web/js/user.js', ['depends' => ['yii\web\YiiAsset']]);
                ?>