<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Role;
use common\models\Group;
use common\models\GroupRole;
use backend\component\BaseController;

/**
 * Group controller
 */
class GroupRoleController extends BaseController
{

    public function actionIndex()
    {
        $groups = [];
        foreach(Group::find()->all() as $g){
            $group = array_filter($g->attributes);
        } 
        
        $roles = [];
        foreach(Role::find()->all() as $r){
            $roles = array_filter($r->attributes);
        } 
        
        $grouproles = [];
        foreach(GroupRole::find()->all() as $gr){
            $grouproles = array_filter($gr->attributes);
        } 
        
        return $this->render('index', [
            'groups' => $groups,
            'roles' => $roles,
            'grouproles' => $grouproles,
        ]);
    }
    
    public function actionGet($id){
        $Group = Group::findOne(['id' => $id]);
        $this->response(true, null, $Group);
    }    
    
    public function searchRole($groupId, $roleId, $grouproles){
        foreach($grouproles as $grr){
            if($grr->roleId == $roleId && $grr->groupId == $groupId)
                return true;
        }
        return false;
    }
    
    public function actionEdit() {
        GroupRole::deleteAll();
        
        $groupRoles = json_decode($_POST['groupRoles'], false);
        foreach($groupRoles as $gRole){
            $gr = new GroupRole();
            $gr->groupId = $gRole->groupId;
            $gr->roleId = $gRole->roleId;
            $gr->insert();
        }
        
        $this->response(true, 'Successfully.', null);
    }
}
