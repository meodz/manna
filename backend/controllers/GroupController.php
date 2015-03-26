<?php

namespace backend\controllers;

use common\models\Group;
use Yii;
use backend\component\BaseController;

/**
 * Group controller
 */
class GroupController extends BaseController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionDelete($id) {
        $model = Group::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Success!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Group not found!');
        }
        $this->redirect(['index']);
    }

    public function actionCreate() {
        $model = new Group();
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
        $model = Group::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'Group not found!');
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
