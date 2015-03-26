<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';

use common\models\Role;
use common\models\Group;
use common\models\GroupRole;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Group Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <script>

            grouprole = {}

            grouprole.edit = function () {
                var grouproles = [];
                var i = 0;
                $('input[type=checkbox]').each(function () {
                    if ($(this).is(':checked')) {
                        grouproles[i] = {};
                        grouproles[i].groupId = parseInt($(this).attr('group'));
                        grouproles[i].roleId = parseInt($(this).attr('role'));
                        i++;
                    }
                });

                popup.confirm("Do you want to save it?", function () {
                    framework.ajax({
                        service: '/grouprole/edit',
                        data: {groupRoles: JSON.stringify(grouproles)},
                        success: function (result) {
                            popup.msg(result.message);
                        },
                        method: 'POST'
                    });
                });
            }
            grouprole.groups = <?= json_encode(json_decode(json_encode($groups), false)) ?>;
            grouprole.grouproles = <?= json_encode(json_decode(json_encode($grouproles), false)) ?>;
            grouprole.roles = <?= json_encode(json_decode(json_encode($roles), false)) ?>;
        </script>
        <table class="table table-striped table-bordered table-hover" id="tbl-list">
            <thead>
                <tr>
                    <td><p>&nbsp;</p></td>
                    <?php foreach (Group::find()->all() as $group) { ?>
                        <td><p><?= $group->name ?></p></td>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $grouproles = GroupRole::find()->all();
                foreach (Role::find()->all() as $role) {
                    ?>
                    <tr align="center" for="<?= $role->name ?>">
                        <td><p><?= $role->name ?></p></td>
                        <?php foreach (Group::find()->all() as $group) { ?>
                            <td><input  <?= Yii::$app->controller->searchRole($group->id, $role->id, $grouproles) ? 'checked="checked"' : '' ?> group="<?= $group->id ?>" role="<?= $role->id ?>" type="checkbox"/></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>                        
        </table>
        <div class="row">
            <div class="col-lg-12">
                <button onclick="grouprole.edit()" type="button" class="btn btn-default pull-right">Save</button>
            </div>
        </div>
    </div>
    <!-- /.row -->            
</div>
<!-- /#page-wrapper -->
<?php
//$this->registerJsFile('@web/js/group.js', ['depends' => ['yii\web\YiiAsset']]);
?>