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
                                    <input class="form-control" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" name="id" id="txt-search-id">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" id="txt-search-name">
                                </div>
                                <div class="form-group">
                                    <label>Site</label>
                                    <select name="siteId" class="form-control" value="<?= isset($_GET['siteId']) ? $_GET['siteId'] : '' ?>">
                                        <option value="0">Select</option>
                                        <?php
                                        foreach (common\models\Site::find()->all() as $site) {
                                            echo '<option value="' . $site->id . '">' . $site->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="button" onclick="user.create()" class="btn btn-default">Create</button>
                                <button type="submit" class="btn btn-default">Filter</button>
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
        use common\models\Category;

$condition = array('parentId' => 0);
        if (isset($_GET['id']) && $_GET['id'] != '')
            $condition += array('id' => $_GET['id']);
        if (isset($_GET['name']) && $_GET['name'] != '')
            $condition += array('name' => $_GET['name']);
        if (isset($_GET['siteId']) && $_GET['siteId'] != '')
            $condition += array('siteId' => $_GET['siteId']);
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->where($condition)->orderBy('`order`'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                [
                    'header' => 'name',
                    'content' => function($data) {
                        $tmp = '';
                        for ($i = 0; $i < $data->level; $i++) {
                            $tmp .= '---';
                        }
                        return $tmp . '<p class="expand fa fa-toggle-right" onclick="category.expand(\'' . $data->id . '\')"></p> ' . $data->name;
                    }
                ],
                [
                    'header' => 'Price multiple',
                    'content' => function($data) {
                        return '<input type="text" name="priceMultiple" value="' . $data->priceMultiple . '"/>';
                    }
                ],
                [
                    'header' => 'Price addition',
                    'content' => function($data) {
                        return '<input type="text" name="priceAddition" value="' . $data->priceAddition . '"/>';
                    }
                ],
                [
                    'header' => 'Site',
                    'content' => function($data) {
                        return '<a>' . $this->context->getSiteName($data->id)->name . '</a>';
                    }
                ],
                [
                    'header' => 'Status',
                    'content' => function($data) {
                        return $data->published == 1 ? '<p class="fa fa-check-circle"></p>' : '<p class="fa fa-times-circle"></p>';
                    }
                ],
                [
                    'header' => 'Action',
                    'content' => function($data) {
                        return '<a onclick="category.edit(\'' . ($data->id) . '\')">Edit</a> | <a onclick="category.del(\'' . ($data->id) . '\')">Remove</a>';
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