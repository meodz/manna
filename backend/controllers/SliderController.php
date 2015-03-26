<?php

namespace backend\controllers;

use common\models\Group;
use common\models\GroupRole;
use backend\models\GroupForm;
use backend\component\BaseController;

/**
 * Group controller
 */
class SliderController extends BaseController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGet($id) {
        $Group = Group::findOne(['id' => $id]);
        $this->response(true, null, $Group);
    }

    public function actionCreate() {
        if (isset($_POST['GroupForm'])) {
            $form = new GroupForm();
            $form->attributes = $_POST['GroupForm'];
            if ($form->validate()) {
                $obj = new Group;
                $obj->attributes = $form->attributes;
                if ($obj->insert()) {
                    $this->response(true, 'Inserted.', $obj);
                } else {
                    $this->response(false, null, $obj->getErrors());
                }
            } else {
                $this->response(false, null, $form->getErrors());
            }
        } else {
            throw new Exception('Data error.');
        }
    }

    public function actionEdit() {
        if (isset($_POST['GroupForm'])) {
            $form = new GroupForm();
            $form->attributes = $_POST['GroupForm'];
            if ($form->validate()) {
                $obj = Group::findOne($form->id);
                $obj->attributes = $form->attributes;

                if ($obj->update()) {
                    $this->response(true, 'Updated.', $obj);
                } else {
                    $this->response(false, null, $obj->getErrors());
                }
            } else {
                $this->response(false, null, $form->getErrors());
            }
        } else {
            throw new Exception('Data error.');
        }
    }

    public function actionDelete($id) {
        $group = Group::findOne($id);
        if ($group->delete()) {
            GroupRole::deleteAll(['groupId' => $id]);
            $this->response(true, 'Deleted.', array('id' => $id));
        } else {
            throw new Exception('Nhóm không tồn tại.');
        }
    }

}
