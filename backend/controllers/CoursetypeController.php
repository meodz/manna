<?php

namespace backend\controllers;

use Yii;
use common\models\CourseType;
use backend\component\BaseController;
    use yii\data\ActiveDataProvider;

/**
 * CourseType controller
 */
class CourseTypeController extends BaseController {

    public function actionIndex() {
//        $this->view->title = 'Quản trị tin tức | Joma.vn';

        $query = CourseType::find();
        if ($type != 0) {

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
//                    'position' => SORT_ASC,
                    'order' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
        ]);
    }
    public function actionDelete($id) {
        $model = CourseType::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Success!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'CourseType not found!');
        }
        $this->redirect(['index']);
    }

    public function actionCreate() {
        $model = new CourseType();
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
        $model = CourseType::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'CourseType not found!');
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
    public function getType() {
        $groups = array();
        $groups[] = 'Tiếng Anh trẻ em';
        $groups[] = 'Tiếng Anh người lớn';
        $groups[] = 'Tiếng Anh giao tiếp';
        $groups[] = 'Luyện thi TOEIC';
        return $groups;
    }
}
