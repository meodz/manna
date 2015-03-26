<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Group</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Group filter
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
                                <button type="button" onclick="group.create()" class="btn btn-default">Create</button>
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
        use common\models\Group;
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'description',
                [
                    'header' => 'Edit',
                    'content' => function($data){
                        return '<a onclick="group.edit(\'' . $data->id . '\')">Edit</a>';
                    }
                ],
                [
                    'header' => 'Remove',
                    'content' => function($data){
                        return '<a onclick="group.del(\'' . $data->id . '\')">Remove</a>';
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
//$this->registerJsFile('@web/js/group.js', ['depends' => ['yii\web\YiiAsset']]);
?>