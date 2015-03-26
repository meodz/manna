<?php

use yii\grid\GridView;
use yii\grid\Column;
use yii\grid\DataColumn;
use yii\helpers\Url;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Danh sách Banner</h3>
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
            <div class="table-responsive">
                <?php

                function displayActive($model) {
                    if ($model->isActive) {
                        return '<span class="label label-success">Được hiển thị</span>';
                    } else {
                        return '<span class="label label-danger">Không hiển thị</span>';
                    }
                }

                function displayAction($model) {
                    return '<div class="btn-group" style="min-width:80px">'
                            . '<a href="' . Url::to(['update', 'id' => $model->id]) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>'
                            . '<a data-confirm="Bạn có chắc chắn muốn xóa Banner này không?" href="' . Url::to(['delete', 'id' => $model->id]) . '" class="btn btn-danger"><i class="fa fa-remove"></i></a>'
                            . '</div>';
                }

                function displayImage($model) {
                    return '<img height="80" src="' . $model->image . '"/>';
                }
                
                function displayPlace($model) {
                    if ($model->place == 1) {
                        return '<span>Giữa trang chủ</span>';
                    } else if($model->place == 2) {
                        return '<span>Bên phải trang chủ</span>';
                    }else{
                        return '<span>Dưới cùng trang chủ</span>';
                    }
                }

                echo GridView::widget([
                    'dataProvider' => $data,
                    'columns' => [
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'id',
                            'format' => 'text',
                        ],
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'name',
                            'format' => 'text',
                        ],
                        [
                            'class' => Column::className(),
                            'header' => 'Ảnh',
                            'content' => 'displayImage'
                        ],
                        [
                            'class' => Column::className(),
                            'header' => 'Vị trí',
                            'content' => 'displayPlace',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'class' => DataColumn::className(),
                            'attribute' => 'position',
                            'format' => 'text',
                        ],
                        [
                            'class' => Column::className(),
                            'header' => 'Hiển thị',
                            'content' => 'displayActive'
                        ],
                        [
                            'class' => Column::className(),
                            'content' => 'displayAction',
                            'contentOptions' => ['class' => 'text-center'],
                            'header' => '<a href="' . Url::to(['new']) . '" class="btn btn-success">Thêm mới</a>',
                            'headerOptions' => ['class' => 'text-center'],
                        ],
                    ],
                ])
                ?>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>