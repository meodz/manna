<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Group;
use backend\component\BaseController;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class UserController extends BaseController {

    public function actionIndex($groupId = 0) {
//        $this->view->title = 'Quản trị tin tức | Joma.vn';

        $query = User::find();
        if ($groupId != 0) {
            $query->andWhere(['groupId' => $groupId]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
//                    'position' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
                    'groups' => $this->getGroup(),
                    'groupId' => $groupId
        ]);
    }

    public function actionDelete($id) {
        $model = User::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Success!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'User not found!');
        }
        $this->redirect(['index']);
    }

    public function actionCreate() {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->salt = uniqid();
            $model->password = sha1($model->password . $model->salt);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
                    'groups' => $this->getGroup()
        ]);
    }

    public function actionEdit($id) {
        $model = User::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'User not found!');
            $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if($model->password != ''){
                $model->salt = uniqid();
                $model->password = sha1($model->password . $model->salt);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
                    'groups' => $this->getGroup()
        ]);
    }

    public function getGroup() {
        $groups = array();
        foreach (Group::find()->all() as $gr) {
            $groups[$gr->id] = $gr->name;
        }
        return $groups;
    }

}
