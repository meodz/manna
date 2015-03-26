<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User filter
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Id</label>
                                    <input class="form-control" name="id" id="txt-search-id">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" id="txt-search-name">
                                </div>
                                <button type="button" onclick="user.create()" class="btn btn-default">Create</button>
                                <button type="button" class="btn btn-default">Filter</button>
                                <button type="reset" class="btn btn-default">Reset</button>
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
        use common\models\Order;

$dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'buyerEmail',
                'buyerAddress',
                'buyerPhone',
                'buyerName',
                [
                    'header' => 'Edit',
                    'content' => function($data) {
                        return '<a onclick="user.edit(\'' . $data->id . '\')">Edit</a>';
                    }
                ],
                [
                    'header' => 'Remove',
                    'content' => function($data) {
                        return '<a onclick="user.del(\'' . $data->id . '\')">Remove</a>';
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