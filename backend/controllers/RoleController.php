<?php

namespace backend\controllers;

use Yii;
use common\models\Role;
use backend\models\RoleForm;
use backend\component\BaseController;

/**
 * Role controller
 */
class RoleController extends BaseController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionDelete($id) {
        $model = Role::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Success!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Role not found!');
        }
        $this->redirect(['index']);
    }

    public function actionCreate() {
        $model = new Role();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
        ]);
    }

    public function actionEdit($id) {
        $model = Role::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'Role not found!');
            $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
        ]);
    }

}
