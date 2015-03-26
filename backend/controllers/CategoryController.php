<?php

namespace backend\controllers;

use Yii;
use backend\component\BaseController;
use common\models\Category;
use backend\models\CategoryForm;

/**
 * Site controller
 */
class CategoryController extends BaseController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGet($id) {
        $user = Category::findOne(['id' => $id]);
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
        if (isset($_POST['CategoryForm'])) {
            $form = new CategoryForm();
            $form->attributes = $_POST['CategoryForm'];
            if ($form->validate()) {
                $obj = new Category;
                $obj->attributes = $form->attributes;
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
        if (isset($_POST['CategoryForm'])) {
            $form = new CategoryForm();
            $form->attributes = $_POST['CategoryForm'];
            if ($form->validate()) {
                $obj = Category::findOne($form->id);
                $obj->attributes = $form->attributes;
                if ($obj->update()) {
                    if ($form->childApply == 1) {
                        $upd = array();
                        $upd['priceMultiple'] = $obj->priceMultiple;
                        $upd['published'] = $obj->published;
                        $obj->updateAll($upd, 'id in(' . implode(',', $obj->selectChildIds()) . ')');
                    }
                    $this->response(true, 'Updated.', $obj);
                } else {
                    $this->response(false, null, $obj->getErrors());
                }
            } else {
                $this->response(false, null, $form->getErrors());
            }
        } else {
            $this->response(false, 'Data error.', null);
        }
    }

    public function getSiteName($id) {
        foreach (\common\models\Site::find()->all() as $site) {
            if ($site->id == $id)
                return $site;
        }
        $site = new \common\models\Site;
        $site->name = 'Không rõ';
        return $site;
    }

    public function actionGetchild($id) {
        $this->response(true, null, Category::find()->where(['parentId' => $id])->all());
    }

}
