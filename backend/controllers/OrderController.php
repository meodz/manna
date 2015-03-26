<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\City;
use common\models\Group;
use backend\models\UserForm;
use backend\component\BaseController;

/**
 * Site controller
 */
class OrderController extends BaseController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGet($id) {
        $user = User::findOne(['id' => $id]);
        $this->response(true, null, $user);
    }

    public function actionGetlocations() {
        $cities = City::find()->orderBy('id DESC')->all();
        $this->response(true, null, $cities);
    }

    public function actionGetgroups() {
        $cities = Group::find()->orderBy('id DESC')->all();
        $this->response(true, null, $cities);
    }

    public function actionCreate() {
        if (isset($_POST['UserForm'])) {
            $form = new UserForm();
            $form->attributes = $_POST['UserForm'];
            if ($form->validate()) {
                $obj = new User;
                $obj->attributes = $form->attributes;
                if ($form->newpassword == '') {
                    $form->addError('newpassword', 'Password cannot be blank.');
                    $this->response(false, null, $form->getErrors());
                    return;
                }
                $obj->salt = uniqid();
                $obj->password = sha1($form->newpassword . $obj->salt);
                if ($obj->insert()) {
                    $this->response(true, 'Created.', $obj);
                } else {
                    throw new Exception('Cannot create user, please try again late.');
                }
            } else {
                if ($form->newpassword == '') {
                    $form->addError('newpassword', 'Password cannot be blank.');
                }
                $this->response(false, null, $form->getErrors());
            }
        } else {
            throw new Exception('Data error.');
        }
    }

    public function actionEdit() {
        if (isset($_POST['UserForm'])) {
            $form = new UserForm();
            $form->attributes = $_POST['UserForm'];
            if ($form->validate()) {
                $obj = User::findOne($form->id);
                $obj->attributes = $form->attributes;
                if ($form->newpassword != '') {
                    $obj->salt = uniqid();
                    $obj->password = sha1($form->newpassword . $obj->salt);
                }
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

}
